<?php

namespace Shin1x1\TwiliojpOsaka\Infrastructure\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;

class ReceiverRepositoryOnArray implements ReceiverRepository
{
    public $receivers = [];

    /**
     * @param Receiver[] $receivers
     */
    public function __construct($receivers = [])
    {
        $this->receivers = collect($receivers);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->receivers;
    }
}
