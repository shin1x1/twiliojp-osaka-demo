<?php

namespace Shin1x1\TwiliojpOsaka\Test\Domain\Service;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Service\GatherCommandDone;
use Shin1x1\TwiliojpOsaka\Domain\Service\GatherCommandFactory;
use Shin1x1\TwiliojpOsaka\Domain\Service\GatherCommandRetry;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class GatherCommandFactoryTest extends \TestCase
{
    /**
     * @test
     * @dataProvider getDataForCreate
     */
    public function create($pushed, $expected)
    {
        $receiver = new Receiver(new TelephoneNo(''), '');
        $this->assertInstanceOf($expected, GatherCommandFactory::create($pushed, $receiver));
    }

    /**
     * @return array
     */
    public function getDataForCreate()
    {
        return [
            ['1', GatherCommandDone::class],
            ['2', GatherCommandRetry::class],
            ['', GatherCommandRetry::class],
        ];
    }
}
