<?php

use Faker\Generator as Faker;

$factory->define(App\blog_category::class, function (Faker $faker) {
    return [
        'category_id'=>App\Category::pluck(id)->random(),
        'blog_id' => App\Blog::pluck(id)->random(),
    ];
});
