<?php

use NunoMaduro\SkeletonPhp\Console\RunFactoryCommand;
use Tests\Factories\UserFactory;
use Tests\Models\User;

it('runs a factory', function (): void {
    $factoryName = UserFactory::class;

    $this->artisan(RunFactoryCommand::class, ['factory' => $factoryName]);

    expect(User::query()->count())->toBe(1);
});
