<?php
namespace Shin1x1\TwiliojpOsaka\Domain\Service;

use Shin1x1\TwiliojpOsaka\Domain\Entity\GatheringLog;
use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\GatheringLogRepository;

class GatherCommandDone extends AbstractGatherCommand
{
    /**
     * @var
     */
    private $repository;

    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * @param GatheringLogRepository $repository
     * @param Receiver $receiver
     */
    public function __construct(GatheringLogRepository $repository, Receiver $receiver)
    {
        $this->repository = $repository;
        $this->receiver = $receiver;
    }

    /**
     * @inheritdoc
     */
    public function execute($pushed)
    {
        $log = new GatheringLog(
            null,
            $this->receiver->getTelNo(),
            $pushed
        );
        $this->repository->add($log);
    }
}
