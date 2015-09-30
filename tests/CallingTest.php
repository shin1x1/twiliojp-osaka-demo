<?php

use Shin1x1\TwiliojpOsaka\Application\Service\TelephoneService;
use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\ReceiverRepositoryOnArray;

class CallingTest extends TestCase
{
    /**
     * @test
     */
    public function calling()
    {
        $mock = Mockery::mock(TelephoneService::class)->makePartial();
        app()->instance(TelephoneService::class, $mock);

        $repository = new ReceiverRepositoryOnArray([
            new Receiver(new TelephoneNo('0612345678'), ''),
        ]);
        app()->instance(ReceiverRepository::class, $repository);

        $mock->shouldReceive('calling')->once();

        $this->get('/twilio/calling')
            ->see('ok');
    }

    /**
     * @test
     */
    public function calling_response()
    {
        $this->post('/twilio/calling/response')
            ->see('<Say')
            ->see('<Gather timeout="10" numDigits="1" action="http://user:pass@localhost/twilio/gathering">');
    }
}
