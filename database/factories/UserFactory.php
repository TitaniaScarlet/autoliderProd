<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Role;
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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(App\User::class, 'admin', function(Faker $faker) {
  return [
      'name' => 'admin',
      'email' => 'AutoliderBrest24@gmail.ru',
      'email_verified_at' => now(),
      'password' => Hash::make('39zifela'), // password
      'remember_token' => Str::random(10),
  ];
});

$factory->defineAs(App\Role::class, 'admin', function(Faker $faker) {
  return [
    'name' => 'Администратор',
    'slug' => 'admin',
    'description' => 'Администратор с полными правами',
    'group' => 'администраторы'
  ];
});