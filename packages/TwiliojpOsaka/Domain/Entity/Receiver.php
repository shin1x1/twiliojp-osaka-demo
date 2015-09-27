<?php
namespace Shin1x1\TwiliojpOsaka\Domain\Entity;

use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

/**
 * Class TelephoneNo
 * @package Shin1x1\TwiliojpOsaka\Domain\Entity
 */
class Receiver
{
    /**
     * @var TelephoneNo
     */
    private $telNo;

    /**
     * @var string
     */
    private $name;

    /**
     * @param TelephoneNo $telNo
     * @param $name
     */
    public function __construct(TelephoneNo $telNo, $name)
    {
        $this->telNo = $telNo;
        $this->name = $name;
    }

    /**
     * @return TelephoneNo
     */
    public function getTelNo()
    {
        return $this->telNo;
    }

    /**
     *
     */
    public function getName()
    {
        return $this->name;
    }
}