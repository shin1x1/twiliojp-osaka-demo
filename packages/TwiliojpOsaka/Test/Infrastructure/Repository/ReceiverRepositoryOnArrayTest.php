<?php

namespace Shin1x1\TwiliojpOsaka\Test\Domain\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\ReceiverRepositoryOnArray;

class ReceiverRepositoryOnArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function findAll()
    {
        $repository = new ReceiverRepositoryOnArray([
            new Receiver(new TelephoneNo(''), ''),
        ]);
        /** @var Receiver[] $receivers */
        $receivers = $repository->findAll();

        $this->assertCount(1, $receivers);
        $this->assertInstanceOf(Receiver::class, $receivers[0]);
    }
}
