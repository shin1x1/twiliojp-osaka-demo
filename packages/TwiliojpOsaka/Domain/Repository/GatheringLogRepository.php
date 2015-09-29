<?php
namespace Shin1x1\TwiliojpOsaka\Domain\Repository;

use Shin1x1\TwiliojpOsaka\Domain\Entity\GatheringLog;

interface GatheringLogRepository
{
    /**
     * @param GatheringLog $log
     * @return GatheringLog
     */
    public function add(GatheringLog $log);
}
