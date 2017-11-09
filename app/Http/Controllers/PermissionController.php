<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $role = Role::findByName('user');

        return view('admin.permission.index', ['role' => $role]);
    }




    public function update(UpdatePermission $request, $id)
    {
        $role = Role::findByName($id);

        if(! empty($request->permissions))
        {
            $role->syncPermissions($request->permissions);
        }
        else
        {
            $permissions =  Permission::all();

            foreach ($permissions as $permission)
            {
                $role->revokePermissionTo($permission->name);
            }
        }

        return json_encode(['success' => true]);
    }


}
