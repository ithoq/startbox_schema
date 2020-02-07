<?php

use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
		'title' => $faker->catchPhrase,
		'slug' => $faker->catchPhrase,
		'content' => $faker->realText($faker->numberBetween(10, 20))
	];
});