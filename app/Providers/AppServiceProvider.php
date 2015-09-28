<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Infrastructure\Repository\ReceiverRepositoryOnEnv;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReceiverRepository::class, ReceiverRepositoryOnEnv::class);
    }
}
