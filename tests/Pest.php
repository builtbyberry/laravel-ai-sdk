<?php

use BuiltByBerry\LaravelAiSdk\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

function getPackageProviders($app): array
{
    return [
        \BuiltByBerry\LaravelAiSdk\LaravelAiSdkServiceProvider::class,
    ];
}
