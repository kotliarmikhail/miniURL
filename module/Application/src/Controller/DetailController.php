<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\ShortUrlsInfo;
use Application\Entity\Url;

class DetailController extends AbstractActionController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {

        $shortCode = $this->params()->fromRoute('code');

        $urlModel = $this->entityManager->getRepository(Url::class)->findOneBy(['shortCode' => $shortCode]);
        $shortUrlInfoModel = $this->entityManager->getRepository(ShortUrlsInfo::class)->findBy(['shortUrlId' => $urlModel->getId()]);

        $chartPlatform = new \src\phpgc();
        $chartUserAgent = new \src\phpgc();
        $chartClicks = new \src\phpgc();


        return new ViewModel([
            'urlModel' => $urlModel,
            'shortUrlInfoModels' => $shortUrlInfoModel,
            'chartPlatform' => $chartPlatform,
            'chartUserAgent' => $chartUserAgent,
            'chartClicks' => $chartClicks,
        ]);
    }
}