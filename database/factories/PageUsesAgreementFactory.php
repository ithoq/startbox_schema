<?php

use App\Models\User;
use App\Models\PageVersion;
use App\Models\PageUsesAgreement;
use Faker\Generator as Faker;

$factory->define(PageUsesAgreement::class, function (Faker $faker) {
    return [
		'page_version_id' => factory(PageVersion::class),
		'user_id' => factory(User::class)
	];
});
