<?php
namespace Shin1x1\TwiliojpOsaka\Domain\Service;

abstract class AbstractGatherCommand implements GatherCommand
{
    /**
     * @inheritdoc
     */
    public function isRetry()
    {
        return false;
    }
}