<?php

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\InputFilter\FormUrlFilter;
use Application\Entity\Url;
use Application\Entity\ShortUrlsInfo;
use Application\Form\UrlForm;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;


class UrlController extends AbstractActionController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $query = $this->entityManager->getRepository(Url::class)->findAddedUrls();
        $page = $this->params()->fromQuery('page', 1);
        $adapter = new DoctrineAdapter(new ORMPaginator($query, false));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(20);
        $paginator->setCurrentPageNumber($page);

        $url = new Url();
        $form = new UrlForm();
        $urlRepository = $this->entityManager->getRepository(Url::class);
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        $inputFilter = new FormUrlFilter($form);
        $form->setInputFilter($inputFilter);

        if ($request->isPost()) {
            $form->setData($request->getPost());

            $isCorrectUrl = $urlRepository->checkAlive($form->get('long_url')->getValue());

            if (!$isCorrectUrl) {
                $this->flashMessenger()->addErrorMessage('The ' . $form->get('long_url')->getValue() . ' is not available. Try again...');
                return $this->redirect()->toRoute('url', ['action' => 'index']);
            }

            if ($form->isValid()) {
                $url->setTimeCreate(date('Y-m-d H:i:s'));

                if ($radio = $form->get('search_text_source')->getValue()) {
                    ($radio == 'one_week')
                        ? $url->setTimeEnd(date('Y-m-d H:i:s', strtotime('+1 week')))
                        : $url->setTimeEnd(date('Y-m-d H:i:s', strtotime('+1 month')));
                }
                $url->setLongUrl($request->getPost('long_url'));

                $url->setShortCode($urlRepository->genShortCode());

                $this->entityManager->persist($url);
                $this->entityManager->flush();

                $this->flashMessenger()->addSuccessMessage('URL added, bravo!');

            }
            return $this->redirect()->toRoute('url');
        }

        return new ViewModel([
            'form' => $form,
            'urls' => $paginator,
        ]);
    }


    public function forwardAction()
    {
        $shortCode = $this->params()->fromRoute('code');

        $urlRepository = $this->entityManager->getRepository(Url::class);
        $shortUrlsInfoRepository = $this->entityManager->getRepository(ShortUrlsInfo::class);

        $url = $urlRepository->findOneBy(['shortCode' => $shortCode]);

        if ($urlRepository->timeLimited($url)) {
            $this->flashMessenger()->addErrorMessage('The domain is overdue');
            return $this->redirect()->toRoute('url', ['action' => 'index']);
        }

        $shortUrlsInfo = new shortUrlsInfo();

        $shortUrlsInfo->setShortUrlId($url->getId());
        $userBrowserInfo = $shortUrlsInfoRepository->getBrowser();
        $shortUrlsInfo->setUserPlatform($userBrowserInfo['platform']);
        $shortUrlsInfo->setUserAgent($userBrowserInfo['name']);
        $shortUrlsInfo->setUserIp($shortUrlsInfoRepository->getIpUser());
        $userLocation = $shortUrlsInfoRepository->getLocation($shortUrlsInfoRepository->getIpUser());
        $shortUrlsInfo->setUserCity($userLocation->city->name);
        $shortUrlsInfo->setUserCountry($userLocation->country->name);
        $shortUrlsInfo->setUserRefer($this->getRequest()->getServer('HTTP_REFERER'));
        $shortUrlsInfo->setDate(date('Y-m-d H:i:s'));

        $incClick = $url->getCounter() + 1;
        $url->setCounter($incClick);

        $this->entityManager->persist($url);
        $this->entityManager->persist($shortUrlsInfo);
        $this->entityManager->flush();

        return $this->redirect()->toUrl($url->getlongUrl());
    }
}
