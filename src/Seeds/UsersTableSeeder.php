<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if(Schema::hasTable('users')){
            if(DB::table('users')->count() == 0){
                if(DB::table('organizations')->count() > 0){
                    $organizations = DB::table('organizations')->get();
                    for ($i=0; $i < 30 ; $i++) { 
                        $email = $faker->safeEmail;
                        $first_name = $faker->firstName;
                        $last_name = $faker->lastName;
                        $user = DB::table('users')->where('email', $email)->first();
                        if(!$user){
                            DB::table('users')->insert([
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'full_name' => $first_name.' '.$last_name,
                                'email' => $faker->email,
                                'organization_id' => $organizations->random()->id,
                                'password' => bcrypt('password'),
                                'is_admin' => false,
                                'email_confirmed' => true,
                                'token' => \Str::random(20),
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
