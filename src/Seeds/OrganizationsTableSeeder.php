<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Faker;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run() 
    {
        $faker = Faker\Factory::create();

        if(Schema::hasTable('organizations')){
            if(DB::table('organizations')->count() == 0){
                for ($i=0; $i < 40 ; $i++) { 
                    $title = $faker->company;
                    $organization = DB::table('organizations')->where('title', $title)->first();
                    if(!$organization){
                        DB::table('organizations')->insert([
                            'title' => $title,
                            'description' => $faker->text,
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'updated_at' => Carbon::now()->toDateTimeString()
                        ]);
                    }
                }
            }
        }
    }
}
