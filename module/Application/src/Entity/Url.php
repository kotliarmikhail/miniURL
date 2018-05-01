<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Element\DateTime;

/**
 * Url
 * @ORM\Table(name="short_urls", uniqueConstraints={@ORM\UniqueConstraint(name="FK_short_code", columns={"short_code"})})
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\UrlRepository")
 */
class Url
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="long_url", type="text", length=65535, nullable=false)
     */
    private $longUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="short_code", type="string", length=6, nullable=false)
     */
    private $shortCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_create", type="datetime", nullable=false)
     */
    private $timeCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_end", type="datetime", nullable=true)
     */
    private $timeEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="counter", type="integer", nullable=false)
     */
    private $counter = '0';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
 * @return string
 */
    public function getLongUrl()
    {
        return $this->longUrl;
    }

    /**
     * @param string $longUrl
     */
    public function setLongUrl($longUrl)
    {
        $this->longUrl = $longUrl;
    }

    /**
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * @param string $shortCode
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;
    }

    /**
     * @return string
     */
    public  function getTimeCreate() {
        $timeCreate = $this->timeCreate->format('Y-m-d H:i:s');
        return $timeCreate;

    }

    /**
     * @param string $timeCreate
     *
     * @return $this
     */
    public function setTimeCreate($timeCreate)
    {
        $this->timeCreate = new \DateTime($timeCreate);
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeEnd()
    {
        $timeEnd = ($this->timeEnd) ? $this->timeEnd->format('Y-m-d H:i:s') : null;

        return $timeEnd;

    }

    /**
     * @param string $timeEnd
     *
     * @return $this
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = new \DateTime($timeEnd);
        return $this;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param int $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }
}

