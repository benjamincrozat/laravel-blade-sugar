<?php

namespace BC\Laravel\BladeSugar\Tests;

use Artisan;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Clean up cache before running any test.
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'BC\Laravel\BladeSugar\ServiceProvider',
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

        $app['config']->set('database.default', 'laravel_blade_sugar');
        $app['config']->set('database.connections.laravel_blade_sugar', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);
    }

    public function renderView(string $name, array $parameters = []) : string
    {
        return view($name)->with($parameters)->render();
    }
}
