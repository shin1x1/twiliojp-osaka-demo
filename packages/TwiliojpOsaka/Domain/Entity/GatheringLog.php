<?php

namespace Shin1x1\TwiliojpOsaka\Domain\Entity;

use Carbon\Carbon;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class GatheringLog
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var TelephoneNo
     */
    private $telephoneNo;

    /**
     * @var string
     */
    private $pushed;

    /**
     * @var Carbon
     */
    private $created_at;

    /**
     * @param int|null    $id
     * @param TelephoneNo $telephoneNo
     * @param $pushed
     * @param Carbon|null $created_at
     */
    public function __construct($id = null, TelephoneNo $telephoneNo, $pushed, Carbon $created_at = null)
    {
        $this->id = $id;
        $this->telephoneNo = $telephoneNo;
        $this->pushed = $pushed;
        $this->created_at = $created_at;
    }

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
     * @return TelephoneNo
     */
    public function getTelephoneNo()
    {
        return $this->telephoneNo;
    }

    /**
     * @param TelephoneNo $telephoneNo
     */
    public function setTelephoneNo(TelephoneNo $telephoneNo)
    {
        $this->telephoneNo = $telephoneNo;
    }

    /**
     * @return string
     */
    public function getPushed()
    {
        return $this->pushed;
    }

    /**
     * @param string $pushed
     */
    public function setPushed($pushed)
    {
        $this->pushed = $pushed;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param Carbon $created_at
     */
    public function setCreatedAt(Carbon $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return [
            'telephoneNo' => $this->telephoneNo->getMaskedTelNo(),
            'pushed'      => $this->pushed,
            'created_at'  => $this->created_at,
        ];
    }
}
