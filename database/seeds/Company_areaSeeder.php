<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Company_areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

            public function run()
            {
                DB::table('company_areas')->insert([
                    'id' => '1',
                    'company_area' => 'Phnom Pech',
                ]);
                DB::table('company_areas')->insert([
                    'id' => '2',
                    'company_area' => 'Kampot',
                ]);
                DB::table('company_areas')->insert([
                    'id' => '3',
                    'company_area' => 'Kompong Thom',
                ]);
                DB::table('company_areas')->insert([
                    'id' => '4',
                    'company_area' => 'Kompong cham',
                ]);
                DB::table('company_areas')->insert([
                    'id' => '5',
                    'company_area' => 'Ta keav',
                ]);
                DB::table('company_areas')->insert([
                    'id' => '6',
                    'company_area' => 'Ta khmau',
                ]);

            }
        }
