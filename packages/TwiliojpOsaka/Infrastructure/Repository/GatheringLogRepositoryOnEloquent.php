<?php
namespace Shin1x1\TwiliojpOsaka\Infrastructure\Repository;

use App\GatheringLog as Eloquent;
use Shin1x1\TwiliojpOsaka\Domain\Entity\GatheringLog;
use Shin1x1\TwiliojpOsaka\Domain\Repository\GatheringLogRepository;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

class GatheringLogRepositoryOnEloquent implements GatheringLogRepository
{
    /**
     * @var Eloquent
     */
    private $eloquent;

    /**
     * @param Eloquent $eloquent
     */
    public function __construct(Eloquent $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param GatheringLog $log
     * @return GatheringLog
     */
    public function add(GatheringLog $log)
    {
        $instance = $this->eloquent->newInstance();
        $instance->telephone_no = $log->getTelephoneNo()->getTelNo();
        $instance->pushed = $log->getPushed();
        $instance->save();
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->eloquent->all()->map(function (Eloquent $log) {
            return new GatheringLog(
                $log->id,
                new TelephoneNo($log->telephone_no),
                $log->pushed,
                $log->created_at
            );
        });
    }
}
