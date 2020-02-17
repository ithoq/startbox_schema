<?php

use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
		'slug' => $faker->catchPhrase,
		'requires_agreement' => $faker->boolean(50)
	];
});
