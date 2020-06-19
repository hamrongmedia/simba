<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all()->sortBy('desc');
        return view('admin.pages.admin_manage.role_list', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->sortBy('desc');
        return view('admin.pages.admin_manage.role_create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate from
        //dd($request);
        //storage data
        $newRole = new Role;
        $newRole->name = $request->name;
        $newRole->guard_name = $request->guard_name;
        $newRole->save();

        if ($request->permission_list) {
            foreach ($request->permission_list as $permission) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $newRole->id,
                    'permission_id' => $permission,
                ]);
            }
        }

        //redirect
        return redirect()->route('admin.role.index');

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
        $permissions = Permission::all()->sortBy('desc');
        $role = Role::find($id);
        //dd($permission->actions->contains('id', 1));
        return view('admin.pages.admin_manage.role_edit', ['role' => $role, 'permissions' => $permissions]);
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
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name ? $request->guard_name : $role->guard_name;
        $role->save();
        // update relation
        // update relation
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        foreach ($request->permission_list as $permission) {
            DB::table('role_has_permissions')->insert([
                'role_id' => $role->id,
                'permission_id' => $permission,
            ]);
        }

        return redirect()->back()->with('success', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Role::find($request->id)->delete();
        return ['msg' => 'Item deleted'];
    }
}