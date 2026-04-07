<?php

declare(strict_types=1);

namespace WilliamJulianVicary\Unfurl\Tests;

use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase as BaseTestCase;
use WilliamJulianVicary\Unfurl\OgImageServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [OgImageServiceProvider::class];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        $app['config']->set('unfurl.route.enabled', true);
        $app['config']->set('unfurl.driver', 'cloudflare');
        $app['config']->set('unfurl.drivers.cloudflare', [
            'account_id' => 'test-account-id',
            'api_token' => 'test-api-token',
        ]);
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }
}
