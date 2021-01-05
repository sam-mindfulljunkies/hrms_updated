<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB,Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => Str::random(10),
            'lname' => Str::random(10),
            'username' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'gender' => 'Male',
            'address' => Str::random(10). " ". Str::random(5),
            'pincode' => rand(111111,999999),
            'contact' => rand(0000000000,9999999999),
            'bank_name' => "TEST ADMIN",
            'account_no' =>  Str::random(14),
            'ifsc' => Str::random(10),
            'salary' => rand(10000,30000),
            'role_id' => 1,
        ]);   

        
        DB::table('users')->insert([
            'fname' => Str::random(10),
            'lname' => Str::random(10),
            'username' => Str::random(10),
            'email' => 'sameer@gmail.com',
            'password' => Hash::make('admin'),
            'gender' => 'Male',
            'address' => Str::random(10). " ". Str::random(5),
            'pincode' => rand(111111,999999),
            'contact' => rand(0000000000,9999999999),
            'bank_name' => "IDBI BANK",
            'account_no' =>  Str::random(14),
            'ifsc' => Str::random(10),
            'salary' => rand(10000,30000),
            'role_id' => 2,
        ]);   
    }
}
