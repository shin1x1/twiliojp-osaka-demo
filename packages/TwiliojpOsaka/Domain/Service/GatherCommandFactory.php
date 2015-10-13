<?php

namespace Shin1x1\TwiliojpOsaka\Domain\Service;

use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\GatheringLogRepository;

class GatherCommandFactory
{
    const PUSHED_DONE = '1';

    /**
     * @param string   $pushed
     * @param Receiver $receiver
     *
     * @return GatherCommandDone|GatherCommandRetry
     */
    public static function create($pushed, Receiver $receiver)
    {
        if ($pushed === static::PUSHED_DONE) {
            return new GatherCommandDone(app(GatheringLogRepository::class), $receiver);
        }

        return new GatherCommandRetry();
    }
}
