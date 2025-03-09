<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Factories\UserFactory;

class User extends Model
{
    use HasFactory;

    protected static string $factory = UserFactory::class;

    protected $fillable = ['name', 'email'];
}
