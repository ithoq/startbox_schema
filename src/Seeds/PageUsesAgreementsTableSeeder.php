<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class PageUsesAgreementsTableSeeder extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {

        if (Schema::hasTable('page_uses_agreements')) {
            if (DB::table('page_uses_agreements')->count() == 0) {
                $pageVersions = \App\Models\PageVersion::get();
                $users = \App\Models\User::get();

                if ($pageVersions->count() && $users->count()) {
                    foreach ($pageVersions as $pageVersion) {
                        DB::table('page_uses_agreements')->insert([
                            'page_version_id' => $pageVersion->getAttribute("id"),
                            'user_id' => $users->random()->getAttribute("id"),
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'updated_at' => Carbon::now()->toDateTimeString()
                        ]);
                    }
                }
            }
        }
    }
}
