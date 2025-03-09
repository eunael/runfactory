<?php

namespace NunoMaduro\SkeletonPhp\Console;

use Illuminate\Console\Command;

class RunFactoryCommand extends Command
{
    protected $signature = 'factory:run {factory}';

    protected $description = 'Run a factory';

    public function handle(): void
    {
        $factoryName = $this->argument('factory');

        $factory = new $factoryName;

        $factory->create();
    }
}
