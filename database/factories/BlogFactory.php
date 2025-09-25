<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
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

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => '<p>'.$faker->paragraph.'</p>',
        'short_description' =>  $faker->paragraph,
        'slug' => $faker->unique()->slug,
        'user_id' => \App\User::find(1),
        'status' => 'published',
        'tags' => 'tags',
        'identifier' => Str::random(10),
        'updated_at' => now(),
        'created_at' =>  now(),
    ];
});
