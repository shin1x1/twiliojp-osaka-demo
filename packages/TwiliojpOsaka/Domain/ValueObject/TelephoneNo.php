<?php
namespace Shin1x1\TwiliojpOsaka\Domain\ValueObject;


/**
 * Class TelephoneNo
 * @package Shin1x1\TwiliojpOsaka\Domain\ValueObject
 */
class TelephoneNo
{
    /**
     * @var string
     */
    private $telNo;

    /**
     * @param string $telNo
     */
    public function __construct($telNo)
    {
        $this->telNo = $telNo;
    }

    /**
     * @return string
     */
    public function getFullTelNo()
    {
        if (empty($this->telNo)) {
            return '';
        }
        if (preg_match('/\A\+/', $this->telNo) > 0) {
            return $this->telNo;
        }

        return '+81' . preg_replace('/\A[0]+/', '', $this->telNo);
    }

    /**
     * @return string
     */
    public function getTelNo()
    {
        return $this->telNo;
    }
}