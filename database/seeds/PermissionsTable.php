<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
          'add-member',
          'add-project',
          'add-permissions',
          'add-contributions',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['guard_name'=>'web','name'=>$permission]);
        }
    }
}
