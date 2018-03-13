<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Admin User',
        'email' => 'admin@admin.com',
        'password' => bcrypt('secret')
    ];
});
