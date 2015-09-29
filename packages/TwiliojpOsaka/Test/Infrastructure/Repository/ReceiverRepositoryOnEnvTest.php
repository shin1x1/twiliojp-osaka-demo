<?php
namespace Shin1x1\TwiliojpOsaka\Test\Domain\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\ReceiverRepositoryOnEnv;

class ReceiverRepositoryOnEnvTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function findAll()
    {
        putenv('TWILIO_RECEIVER_NAME1=hoge');
        putenv('TWILIO_RECEIVER_TEL_NO1=0612345678');

        $repository = new ReceiverRepositoryOnEnv();
        /** @var Receiver[] $receivers */
        $receivers = $repository->findAll();

        $this->assertCount(1, $receivers);
        $this->assertSame('hoge', $receivers[0]->getName());
        $this->assertSame('0612345678', $receivers[0]->getTelNo()->getTelNo());
    }
}
