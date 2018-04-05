<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'publish_date' => $faker->dateTime('now'),
        'status' => 'Published',
        'title' => $faker->sentence,
        'blog_text' => $faker->sentences(8, true),
        'image' => 'closeit.jpg',
        'alt_text' => 'an image',
        'user_id' => \App\User::first()->id,
    ];
});
