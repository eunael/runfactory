<?php

namespace Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => 'test',
            'email' => 'test@email.com',
        ];
    }
}
