<?php

use Eunael\RunFactory\Console\RunFactoryCommand;
use Tests\Factories\UserFactory;
use Tests\Models\User;

it('runs a factory', function (): void {
    $factoryName = UserFactory::class;

    $this->artisan(RunFactoryCommand::class, ['factory' => $factoryName]);

    expect(User::query()->count())->toBe(1);
});

it('informs the amount of registration', function (): void {
    $factoryName = UserFactory::class;

    $this->artisan(RunFactoryCommand::class, ['factory' => $factoryName, 'count' => 5]);

    expect(User::query()->count())->toBe(5);
});
