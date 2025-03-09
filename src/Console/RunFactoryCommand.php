<?php

namespace Eunael\RunFactory\Console;

use Eunael\RunFactory\Actions\GetFactoryChoicesActionClass;
use Illuminate\Console\Command;

use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class RunFactoryCommand extends Command
{
    protected $factoryName;

    protected $count;

    protected $signature = 'factory:run {factory?} {count=1}';

    protected $description = 'Run a factory';

    public function handle(): void
    {
        [$this->factoryName, $this->count] = [
            $this->argument('factory'),
            $this->argument('count')
        ];

        if(is_null($this->factoryName)) {
            $this->promptForFactoryName();

            $this->promptForFactoryCount();
        }

        $factory = new $this->factoryName(count: $this->count);

        $factory->create();
    }

    protected function promptForFactoryName(): void
    {
        $choices = GetFactoryChoicesActionClass::choices();

        $choice = windows_os()
            ? select(
                "Which foctory would you like to run?",
                $choices,
                scroll: 15,
            )
            : search(
                label: "Which foctory would you like to run?",
                placeholder: 'Search...',
                options: fn ($search): array => array_values(array_filter(
                    $choices,
                    fn ($choice): bool => str_contains(strtolower((string) $choice), strtolower((string) $search))
                )),
                scroll: 15,
            );

        if(is_null($choice)) {
            return;
        }

        $this->factoryName = $choice;
    }

    protected function promptForFactoryCount(): void
    {
        $this->count = (int) text('How many records will be generated?', default: 1);
    }
}
