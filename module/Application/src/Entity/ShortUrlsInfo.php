<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShortUrlsInfo
 *
 * @ORM\Table(name="short_urls_info", indexes={@ORM\Index(name="FK_short_url_id", columns={"short_url_id"})})
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\ShortUrlsInfoRepository")
 */
class ShortUrlsInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="short_url_id", type="integer", nullable=false)
     */
    private $shortUrlId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_platform", type="string", length=255, nullable=true)
     */
    private $userPlatform;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=true)
     */
    private $userAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="user_refer", type="string", length=255, nullable=true)
     */
    private $userRefer;

    /**
     * @var string
     *
     * @ORM\Column(name="user_ip", type="string", length=255, nullable=false)
     */
    private $userIp;

    /**
     * @var string
     *
     * @ORM\Column(name="user_country", type="string", length=255, nullable=true)
     */
    private $userCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="user_city", type="string", length=255, nullable=true)
     */
    private $userCity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserPlatform(): string
    {
        return $this->userPlatform;
    }

    /**
     * @param string $userPlatform
     */
    public function setUserPlatform(string $userPlatform)
    {
        $this->userPlatform = $userPlatform;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent(string $userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getUserRefer(): string
    {
        return $this->userRefer;
    }

    /**
     * @param string $userRefer
     */
    public function setUserRefer($userRefer)
    {
        $this->userRefer = $userRefer;
    }

    /**
     * @return string
     */
    public function getUserIp(): string
    {
        return $this->userIp;
    }

    /**
     * @param string $userIp
     */
    public function setUserIp(string $userIp)
    {
        $this->userIp = $userIp;
    }

    /**
     * @return string
     */
    public function getUserCountry(): string
    {
        return $this->userCountry;
    }

    /**
     * @param string $userCountry
     */
    public function setUserCountry(string $userCountry)
    {
        $this->userCountry = $userCountry;
    }

    /**
     * @return string
     */
    public function getUserCity(): string
    {
        return $this->userCity;
    }

    /**
     * @param string $userCity
     */
    public function setUserCity(string $userCity)
    {
        $this->userCity = $userCity;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @raturn $this
     */
    public function setDate($date)
    {
        $this->date = new \DateTime($date);
        return $this;
    }


    /**
     * @return int
     */
    public function getShortUrlId(): int
    {
        return $this->shortUrlId;
    }

    /**
     * @param int $shortUrlId
     */
    public function setShortUrlId(int $shortUrlId)
    {
        $this->shortUrlId = $shortUrlId;
    }

}

