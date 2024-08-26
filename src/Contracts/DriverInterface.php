<?php

declare(strict_types=1);

namespace BuiltByBerry\LaravelAiSdk\Contracts;

interface DriverInterface
{
    public function authenticate(): void;

    public function execute(string $input): array;

    public function parseResponse($response): array;
}
