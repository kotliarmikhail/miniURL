<?php
namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Entity\Url;

class UrlRepository extends EntityRepository
{
    /**
     * Allowed characters for short urls
     */
    const ALLOWED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';


    /**
     * @return Query
     */
    public function findAddedUrls()
    {
        $entityManager = $this->getEntityManager();

        $queryBuilder = $entityManager->createQueryBuilder();

        $queryBuilder->select('u')
            ->from(Url::class,'u')
            ->orderBy('u.id', 'DESC');

        return $queryBuilder->getQuery();
    }

    /**
     * @return string
     */
    public function genShortCode()
    {
        do {
            $shortCode = substr(str_shuffle(self::ALLOWED_CHARS), 0, 6);
        } while ($this->findBy(['shortCode' => $shortCode]));

        return $shortCode;
    }

    /**
     * @param $url
     * @param $timeout
     * @throws \Exception
     *
     * @return bool
     */
    function checkAlive($url, $timeout = 10) {
        $ch = curl_init($url);

        // Set request options
        curl_setopt_array($ch, array(
            CURLOPT_SSL_VERIFYHOST =>false,
            CURLOPT_SSL_VERIFYPEER =>false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_NOBODY => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_USERAGENT => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36"
        ));

        // Execute request
        curl_exec($ch);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
            return false;
        }

        return true;
    }

    /**
     * @param $url
     *
     * @return bool
     */
    public function timeLimited($url)
    {
        if (!is_null($url->getTimeEnd()) && date("Y-m-d H:i:s") > $url->getTimeEnd()) {
            return true;
        }

         return false;
    }
}
