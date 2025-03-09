<?php

namespace NunoMaduro\SkeletonPhp\Console;

use Illuminate\Console\Command;

class RunFactoryCommand extends Command
{
    protected $signature = 'factory:run {factory} {count=1}';

    protected $description = 'Run a factory';

    public function handle(): void
    {
        $factoryName = $this->argument('factory');

        $count = (int) $this->argument('count');

        $factory = new $factoryName(count: $count);

        $factory->create();
    }
}
