<?php

namespace BuiltByBerry\LaravelAiSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BuiltByBerry\LaravelAiSdk\LaravelAiSdk
 */
class LaravelAiSdk extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BuiltByBerry\LaravelAiSdk\LaravelAiSdk::class;
    }
}
