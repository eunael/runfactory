<?php

namespace Eunael\RunFactory;

use Eunael\RunFactory\Console\RunFactoryCommand;
use Illuminate\Support\ServiceProvider;

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
