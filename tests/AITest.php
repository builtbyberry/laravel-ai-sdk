<?php

declare(strict_types=1);

namespace BuiltByBerry\LaravelAiSdk\Tests;

use BuiltByBerry\LaravelAiSdk\AI;
use BuiltByBerry\LaravelAiSdk\Drivers\SampleDriver;
use BuiltByBerry\LaravelAiSdk\Contracts\DriverInterface;

test('it can execute the AI service', function () {
    $driver = new SampleDriver();
    $ai = new AI($driver);

    $response = $ai->execute('Hello, world!');

    expect($response)->toBeArray();
});
