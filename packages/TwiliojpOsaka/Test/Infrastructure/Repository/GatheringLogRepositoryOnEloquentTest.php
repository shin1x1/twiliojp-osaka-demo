<?php
namespace Shin1x1\TwiliojpOsaka\Test\Domain\Repository;

use App\GatheringLog;
use Shin1x1\TwiliojpOsaka\Domain\Repository\GatheringLogRepository;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\GatheringLogRepositoryOnEloquent;

class GatheringLogRepositoryOnEloquentTest extends \TestCase
{
    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        /** @var \Eloquent $eloquent */
        $eloquent = app(GatheringLog::class);
        $eloquent->truncate();

        $eloquent->unguard();
        $eloquent->create([
            'telephone_no' => '0612345678',
            'pushed'       => '1',
        ]);
        $eloquent->reguard();
    }


    /**
     * @test
     */
    public function findAll()
    {
        /** @var GatheringLogRepository $repository */
        $repository = app(GatheringLogRepositoryOnEloquent::class);
        /** @var \Shin1x1\TwiliojpOsaka\Domain\Entity\GatheringLog[] $logs */
        $logs = $repository->findAll();

        $this->assertCount(1, $logs);
        $this->assertSame('0612345678', $logs[0]->getTelephoneNo()->getTelNo());
    }
}
