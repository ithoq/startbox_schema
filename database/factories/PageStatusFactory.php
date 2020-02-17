<?php

use App\Models\PageStatus;
use Faker\Generator as Faker;

$factory->define(PageStatus::class, function (Faker $faker) {
    return [
		'status' => Arr::random(['Published', 'Draft', 'Pending'])
	];
});
