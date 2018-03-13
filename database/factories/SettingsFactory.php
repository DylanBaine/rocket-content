<?php

use Faker\Generator as Faker;

$factory->define(\App\Setting::class, function (Faker $faker) {
    return [
        'icon' => 'https://www.pencilrocketcreative.com/wp-content/uploads/2017/06/cropped-PencilRocket.png',
        'title' => 'RocketContent'
    ];
});
