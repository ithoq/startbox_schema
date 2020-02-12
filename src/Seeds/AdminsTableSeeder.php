<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        if(Schema::hasTable('admins')){
            if(DB::table('admins')->count() == 0){
                for ($i=1; $i < 4 ; $i++) { 
                    $super_admin = DB::table('admins')->where('email', 'admin' . $i . '@example.com')->first();
                    if (!$super_admin) {
                        DB::table('admins')->insert([
                            'first_name' => 'Admin-'. $i,
                            'last_name' => 'StartBox',
                            'email' => 'admin'.$i.'@example.com',
                            'password' => bcrypt('password'),
                            'status' => 'active',
                            'email_verified_at' => Carbon::now()->toDateTimeString(),
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'updated_at' => Carbon::now()->toDateTimeString()
                        ]);
                    }
                }
            }
        }
    }
}
