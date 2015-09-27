<?php
namespace Shin1x1\TwiliojpOsaka\Domain\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;

interface ReceiverRepository
{
    /**
     * @return Receiver[]
     */
    public function findAll();
}
