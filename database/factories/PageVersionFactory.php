<?php

use App\Models\Page;
use App\Models\PageStatus;
use App\Models\PageVersion;
use Faker\Generator as Faker;

$factory->define(PageVersion::class, function (Faker $faker) {
    return [
		'title' => $faker->catchPhrase,
		'content' => $faker->realText($faker->numberBetween(10, 20)),
        'page_id' => factory(Page::class),
        'status_id' => factory(PageStatus::class),
	];
});
