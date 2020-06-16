<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all()->sortBy('desc');
        return view('Admin.pages.admin_manage.user_list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->sortBy('desc');
        $roles = Role::all()->sortBy('desc');
        return view('Admin.pages.admin_manage.user_create', ['permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate form
        // store data

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        //dd($data['password']);
        $new_user = Admin::create($data);

        if ($request->roles) {
            foreach ($request->roles as $role) {
                DB::table('user_has_roles')->insert([
                    'user_id' => $new_user->id,
                    'role_id' => $role,
                ]);
            }
        }

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                DB::table('user_has_permissions')->insert([
                    'user_id' => $new_user->id,
                    'permission_id' => $permission,
                ]);
            }
        }

        //redirect to list user
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}