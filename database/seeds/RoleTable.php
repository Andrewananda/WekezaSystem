<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'member'
        ];
        foreach ($roles as $role) {
            Role::create(['guard_name'=>'web','name'=>$role]);
        }
    }
}
