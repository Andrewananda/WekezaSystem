<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name'=>'Admin',
            'phone'=>'0723546707',
            'email'=>'admin@gmail.com',
            'username'=>'andrew.ananda',
            'id_number'=>'37098212',
            'password'=>Hash::make('secret')
        ]);
    }
}
