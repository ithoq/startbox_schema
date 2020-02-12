<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Faker;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if(Schema::hasTable('facilities')){
            if(DB::table('facilities')->count() == 0){
                if(DB::table('organizations')->count() > 0){
                    $organizations = DB::table('organizations')->get();
                    for ($i=0; $i < 30 ; $i++) { 
                        $organization = $organizations->random();
                        $title = $faker->company;
                        $facility = DB::table('facilities')->where('title', $title)->where('organization_id', $organization->id)->first();
                        if(!$facility){
                            DB::table('facilities')->insert([
                                'title' => $title,
                                'description' => $faker->text,
                                'organization_id' => $organization->id,
                                'timezone' => $faker->timezone,
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
