<?php

namespace BuiltByBerry\LaravelAiSdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BuiltByBerry\LaravelAiSdk\Commands\LaravelAiSdkCommand;

class LaravelAiSdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ai-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_ai_sdk_table')
            ->hasCommand(LaravelAiSdkCommand::class);
    }
}
