<?php

use Faker\Generator as Faker;

$factory->define(App\NewsletterSubscriber::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rating' => 0
    ];
});
