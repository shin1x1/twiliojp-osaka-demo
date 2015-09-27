<?php
namespace Shin1x1\TwiliojpOsaka\Domain\ValueObject;


use Shin1x1\Ddd\Domain\ValueObject\ReadOnlyTrait;

class TelephoneNo
{
    use ReadOnlyTrait;

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
        return '+81' . $this->telNo;
    }
}