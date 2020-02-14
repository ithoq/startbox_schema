<?php

use App\Models\User;
use App\Models\Provider;
use App\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'organization_id' => factory(Organization::class),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'full_name' => function (array $provider) {
            return $provider['first_name'] . ' ' . $provider['last_name'];
        },
        'suffix_type' => Arr::random(['md', 'phd', 'md-phd', 'rn', 'pa', 'np']),
    ];
});

$factory->afterCreatingState(Provider::class, 'as-user', function ($provider, $faker) {
    factory(User::class)->create([
        'profileable_id' => $provider->id,
        'profileable_type' => Provider::class,
    ]);
});