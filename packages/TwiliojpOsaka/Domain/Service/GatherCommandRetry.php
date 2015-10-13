<?php

namespace Shin1x1\TwiliojpOsaka\Domain\Service;

class GatherCommandRetry extends AbstractGatherCommand
{
    /**
     * {@inheritdoc}
     */
    public function execute($pushed)
    {
        // nop
    }

    /**
     * {@inheritdoc}
     */
    public function isRetry()
    {
        return true;
    }
}
