<?php

namespace Eunael\RunFactory;

use Illuminate\Support\ServiceProvider;
use Eunael\RunFactory\Console\RunFactoryCommand;

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
