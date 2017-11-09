<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:add_users')->only('store');
        $this->middleware('permission:edit_users')->only('update');
        $this->middleware('permission:delete_users')->only('destroy');
        $this->middleware('ajax', ['only' => ['store', 'update', 'destroy']]);
    }



    public function index(Request $request)
    {
        $users = User::with('roles')->with('permissions')
                       ->search($request->q)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admin.user.index', ['users' => $users]);
    }




    public function create()
    {
        return view('admin.user.create');
    }




    public function store(StoreUser $request)
    {
        $user = User::create($request->except('role'));

        if ($request->has('role'))
        {
            $user->assignRole($request->role);
        }

        return json_encode(['success' => true, 'user_id' => $user->encode_id]);
    }




    public function show($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);

        return view('admin.user.show', ['user' => $user]);
    }




    public function edit($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);

        return view('admin.user.edit', ['user' => $user]);
    }




    public function update(UpdateUser $request, $id)
    {
        $user = User::find(\Hashids::decode($id)[0]);
        $user->update($request->except('role'));

        if ($request->has('role'))
        {
            $user->syncRoles($request->role);
        }

        return json_encode(['success' => true]);
    }




    public function destroy($id)
    {
        $user = User::find(\Hashids::decode($id)[0])->delete();

        return json_encode(['success' => true]);
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}
