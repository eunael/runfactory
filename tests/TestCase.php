<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use NunoMaduro\SkeletonPhp\RunFactoryServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

abstract class TestCase extends TestbenchTestCase
{
    use RefreshDatabase;

    protected function getEnvironmentSetUp($app)
    {
        // Database
        $app['config']->set('database.default', 'testing');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    protected function getPackageProviders($app)
    {
        return [
            RunFactoryServiceProvider::class,
        ];
    }
}
