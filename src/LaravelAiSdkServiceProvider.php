<?php

declare(strict_types=1);

namespace BuiltByBerry\LaravelAiSdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAiSdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ai-sdk')
            ->hasConfigFile();
    }

    public function register(): void
    {
        $this->app->singleton(AI::class, function ($app) {
            $driver = config('ai.driver');

            return new AI(new $driver);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/ai.php' => config_path('ai.php'),
            ], 'config');
        }
    }
}
