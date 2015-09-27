<?php
namespace Shin1x1\TwiliojpOsaka\Infrastructure\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class ReceiverRepositoryOnArray implements ReceiverRepository
{
    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return [
            new Receiver(new TelephoneNo('0612345678'), '大阪太郎'),
        ];
    }
}