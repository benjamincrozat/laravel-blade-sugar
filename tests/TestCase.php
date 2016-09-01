<?php

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    /**
     * Clean up cache before running any test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'BC\Laravel\LaravelBladeSugar\ServiceProvider',
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [ __DIR__ . '/views' ]);
    }

    /**
     * Render a view.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return string
     */
    protected function renderView($name, $parameters = [])
    {
        return view($name, $parameters)->render();
    }
}
