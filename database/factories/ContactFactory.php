<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->email,
        'phone' => $faker->phone,
        'message' => $faker->message
    ];
});
