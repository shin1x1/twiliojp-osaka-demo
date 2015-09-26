<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Services_Twilio;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Services_Twilio::class, function () {
            return new Services_Twilio(
                env('TWILIO_ACCOUNT_SID'),
                env('TWILIO_AUTH_TOKEN')
            );
        });
    }
}
