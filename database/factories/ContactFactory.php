<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'birthdate' => $faker->date,
        'favorite_color' => $faker->word,
        'last_contacted_at' => $faker->date,
    ];
});
