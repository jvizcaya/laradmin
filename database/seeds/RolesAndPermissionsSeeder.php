<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    private $permissions , $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                /* user */
                                'view_users',
                                'add_users',
                                'edit_users',
                                'delete_users',
                                'assign_permissions',
                                'view_logins',
                              ];
        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->user_permissions = ['edit_users', 'view_logins'];

    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo($this->user_permissions);
    }
}
