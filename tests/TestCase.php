<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    protected static $migrated = false;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        if (static::$migrated) {
            return;
        }

        /** @var \Illuminate\Contracts\Console\Kernel $artisan */
        $artisan = app(Illuminate\Contracts\Console\Kernel::class);
        $artisan->call('migrate');

        static::$migrated = true;
    }
}
