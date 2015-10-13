<?php

namespace Shin1x1\TwiliojpOsaka\Domain\Service;

interface GatherCommand
{
    /**
     * @param $pushed
     */
    public function execute($pushed);

    /**
     * @return bool
     */
    public function isRetry();
}
