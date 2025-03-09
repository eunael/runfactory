<?php

namespace NunoMaduro\SkeletonPhp;

use Illuminate\Support\ServiceProvider;
use NunoMaduro\SkeletonPhp\Console\RunFactoryCommand;

class RunFactoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RunFactoryCommand::class,
            ]);
        }
    }
}
