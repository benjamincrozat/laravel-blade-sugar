<?php

use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    /**
     * Clean up views cache before running any test.
     */
    public function setUp() : void
    {
        parent::setUp();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BC\Laravel\BladeSugar\ServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__ . '/resources/views']);
    }
}
