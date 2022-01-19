<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'ADMIN',
        ]); 
        DB::table('roles')->insert([
            'role_name' => 'EMPLOYEE',
        ]);   
    }
}
