<?php

declare(strict_types=1);

namespace BuiltByBerry\LaravelAiSdk;

use BuiltByBerry\LaravelAiSdk\Commands\LaravelAiSdkCommand;
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
        $this->publishes([
            __DIR__.'/../config/ai.php' => config_path('ai.php'),
        ]);
    }
}
