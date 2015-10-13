<?php

namespace Shin1x1\TwiliojpOsaka\Test\Domain\ValueObject;

use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class TelephoneNoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider getDataForGetFullTelNo
     */
    public function getFullTelNo($telNo, $expected)
    {
        $this->assertSame($expected, (new TelephoneNo($telNo))->getFullTelNo());
    }

    /**
     * @return array
     */
    public function getDataForGetFullTelNo()
    {
        return [
            ['0612345678', '+81612345678'],
            ['+81612345678', '+81612345678'],
            ['', ''],
            [null, ''],
        ];
    }

    /**
     * @test
     * @dataProvider getDataForGetMaskedTelNo
     */
    public function getMaskedTelNo($telNo, $expected)
    {
        $this->assertSame($expected, (new TelephoneNo($telNo))->getMaskedTelNo());
    }

    /**
     * @return array
     */
    public function getDataForGetMaskedTelNo()
    {
        return [
            ['0612345678', '****-****-5678'],
            ['', ''],
            [null, ''],
        ];
    }
}
