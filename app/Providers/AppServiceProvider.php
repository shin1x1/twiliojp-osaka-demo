<?php

namespace App\Providers;

use Illuminate\Log\Writer;
use Illuminate\Support\ServiceProvider;
use Shin1x1\TwiliojpOsaka\Domain\Repository\GatheringLogRepository;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\GatheringLogRepositoryOnEloquent;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\ReceiverRepositoryOnEnv;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Writer $logger)
    {
        $logger->useFiles('php://stdout');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReceiverRepository::class, ReceiverRepositoryOnEnv::class);
        $this->app->bind(GatheringLogRepository::class, GatheringLogRepositoryOnEloquent::class);
    }
}
