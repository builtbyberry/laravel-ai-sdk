<?php

declare(strict_types=1);

return [

    /*
     |--------------------------------------------------------------------------
     | Default AI Driver
     |--------------------------------------------------------------------------
     |
     | This option controls the default AI driver that will be used to interact
     | with various AI services. You can set this to any of the drivers provided
     | in this package or extend it with your own custom drivers.
     |
     */

    'default' => env('AI_DRIVER', \BuiltByBerry\LaravelAiSdk\Drivers\SampleDriver::class),

    /*
     |--------------------------------------------------------------------------
     | AI Drivers Configuration
     |--------------------------------------------------------------------------
     |
     | Here you may configure as many AI drivers as you wish. Each driver has a
     | corresponding configuration array, allowing you to define API keys and
     | other settings specific to that driver.
     |
     */

    'drivers' => [
        'sample' => [
            'api_key' => env('SAMPLE_API_KEY'),
            // Other driver-specific configuration options
        ],

        // Additional drivers can be added here
    ],
];
