<?php

declare(strict_types=1);

namespace BuiltByBerry\LaravelAiSdk;

use BuiltByBerry\LaravelAiSdk\Contracts\DriverInterface;

class AI
{
    public function __construct(protected DriverInterface $driver)
    {
    }

    public function execute(string $input): array
    {
        return $this->driver->execute($input);
    }
}
