<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Faker;

class PageStatusesTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if (Schema::hasTable('page_statuses')) {
            if (DB::table('page_statuses')->count() == 0) {
                $statuses = ["Published", "Archived", "Pending"];
                foreach ($statuses as $status) {
                    DB::table('page_statuses')->insert([
                        'status' => $status,
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'updated_at' => Carbon::now()->toDateTimeString()
                    ]);
                }
            }
        }
    }
}
