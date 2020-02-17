<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Faker;

class PagesTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if (Schema::hasTable('pages')) {
            if (DB::table('pages')->count() == 0) {
                for ($i = 1; $i <= 40; $i++) {
                    DB::table('pages')->insert([
                        'slug' => "page-$i",
                        'requires_agreement' => $faker->boolean(),
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'updated_at' => Carbon::now()->toDateTimeString()
                    ]);
                }
            }
        }
    }
}
