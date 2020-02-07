<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Admin extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $super_admin = DB::table('admins')->where('email', 'admin@example.com')->first();
        if (!$super_admin) {
            DB::table('admins')->insert([
                'first_name' => 'Admin',
                'last_name' => 'StartBox',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin-123'),
                'status' => 'active',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
