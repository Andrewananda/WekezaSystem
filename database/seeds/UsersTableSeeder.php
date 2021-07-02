<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate([
            'name'=>'admin'
        ]);

        $admin_permissions = [];

        foreach ($admin_permissions as $admin_permission) {
            if (!$admin->hasPermission($admin_permissions)){
                $admin->givePermissionTo($admin_permission);
            }
        }

        $user = User::firstOrCreate([
            'name'=>'Admin',
            'phone'=>'0723546707',
            'email'=>'admin@gmail.com',
            'username'=>'andrew.ananda',
            'id_number'=>'37098212',
            'password'=>Hash::make('secret')
        ]);

        if (!$user->hasRole($admin)) {
            $user->assignRole($admin);
        }

    }
}
