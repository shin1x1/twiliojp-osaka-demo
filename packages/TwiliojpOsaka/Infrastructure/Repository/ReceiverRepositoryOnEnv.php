<?php
namespace Shin1x1\TwiliojpOsaka\Infrastructure\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class ReceiverRepositoryOnEnv implements ReceiverRepository
{
    const MAX_RECEIVER = 100;

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        $receivers = collect();

        for ($i = 1; $i < static::MAX_RECEIVER; $i++) {
            $telNoName = sprintf('TWILIO_RECEIVER_TEL_NO%d', $i);
            $keyName = sprintf('TWILIO_RECEIVER_NAME%d', $i);

            if (empty(env($telNoName)) || empty(env($keyName))) {
                break;
            }

            $receivers->push(new Receiver(
                new TelephoneNo(env($telNoName)),
                env($keyName)
            ));
        }

        return $receivers->toArray();
    }
}