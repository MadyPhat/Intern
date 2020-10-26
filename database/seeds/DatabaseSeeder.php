<?php

use App\company_areas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             RolesTableSeeder::class,
             UsersTableSeeder::class,
             Company_areaSeeder::class,
         ]);
    }
}
