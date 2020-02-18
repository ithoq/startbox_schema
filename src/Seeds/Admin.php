<?php

namespace StartBox\Schema\Seeds;

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Seed the admin related data
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageStatusesTableSeeder::class);
        $this->call(PageVersionsTableSeeder::class);
        $this->call(PageUsesAgreementsTableSeeder::class);

    }
}
