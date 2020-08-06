<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;
    $name = $faker->name;
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'slug' => Str::slug($name),
        'gender' => 0,
        'avatar' => 'public/defaults/avatars/female.png',
        'email_verified_at' => now(),
        'password' => '12345678', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Profile::class, function (Faker $faker) {
    return [
        'location' => $faker->city,
        'about' => $faker->paragraph(4)

    ];

});
