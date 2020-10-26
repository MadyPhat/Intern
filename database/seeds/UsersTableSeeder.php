<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'evaluator',
            'last_name' => 'evaluator',
            'email' => 'evaluator@admin.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
