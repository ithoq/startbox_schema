<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Faker;

class PageVersionsTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if (Schema::hasTable('page_versions')) {
            if (DB::table('page_versions')->count() == 0) {
                for ($i = 1; $i <= 40; $i++) {
                    $page = \App\Models\Page::where("slug", "page-$i")->first();
                    $status = \App\Models\PageStatus::where("status", Arr::random(['Published', 'Draft', 'Pending']))->first();
                    if ($page && $status) {
                        DB::table('page_versions')->insert([
                            'page_id' => $page->getAttribute("id"),
                            'status_id' => $status->getAttribute("id"),
                            'title' => "Page $i",
                            'content' => $faker->realText($faker->numberBetween(10, 20)),
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'updated_at' => Carbon::now()->toDateTimeString()
                        ]);
                    }

                }
            }
        }
    }
}
