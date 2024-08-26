<?php

namespace BuiltByBerry\LaravelAiSdk\Commands;

use Illuminate\Console\Command;

class LaravelAiSdkCommand extends Command
{
    public $signature = 'laravel-ai-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
