<?php

namespace Shin1x1\TwiliojpOsaka\Application\Service;

use Services_Twilio;
use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class TelephoneService
{
    /**
     * @var Services_Twilio
     */
    private $twilio;

    public function __construct(Services_Twilio $twilio)
    {
        $this->twilio = $twilio;
    }

    /**
     * @param TelephoneNo $fromNo
     * @param Receiver    $receiver
     * @param string      $callbackUrl
     */
    public function calling(TelephoneNo $fromNo, Receiver $receiver, $callbackUrl)
    {
        $this->twilio->account->calls->create(
            $fromNo->getFullTelNo(),
            $receiver->getTelNo()->getFullTelNo(),
            $callbackUrl
        );
    }
}
