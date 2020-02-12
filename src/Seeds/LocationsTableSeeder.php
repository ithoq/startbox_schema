<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Faker;

class LocationsTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if(Schema::hasTable('locations')){
            if(DB::table('locations')->count() == 0){
                if(DB::table('facilities')->count() > 0){
                    $facilities = DB::table('facilities')->get();
                    for ($i=0; $i < 25 ; $i++) { 
                        $title = $faker->catchPhrase;
                        $facility = $facilities->random();
                        $location = DB::table('locations')->where('title', $title)->where('facility_id', $facility->id)->first();
                        if(!$location){
                            DB::table('locations')->insert([
                                'title' => $title,
                                'description' => $faker->text,
                                'facility_id' => $facility->id,
                                'organization_id' => $facility->organization_id,
                                'latitude' => $faker->latitude(-10,10),
                                'longitude' => $faker->longitude(-10,10),
                                'created_at' => Carbon::now()->toDateTimeString(),
                                'updated_at' => Carbon::now()->toDateTimeString()
                            ]);
                        }
                    }
                }
            }
        }
    }
}
