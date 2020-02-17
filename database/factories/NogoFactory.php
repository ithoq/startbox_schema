<?php

use App\Models\Nogo;
use App\Models\User;
use App\Models\Patient;
use App\Models\Facility;
use App\Models\Provider;
use App\Models\Procedure;
use Illuminate\Support\Arr;
use App\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Nogo::class, function (Faker $faker) {
    return [
        'organization_id' => factory(Organization::class),
        'provider_id' => factory(Provider::class),
        'patient_id' => factory(Patient::class),
        'procedure_id' => factory(Procedure::class),
        'reason_id' => Arr::random(array_keys(Nogo::REASONS)),
        'description' => $faker->paragraph,
    ];
});