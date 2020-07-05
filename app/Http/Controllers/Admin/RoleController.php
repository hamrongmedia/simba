<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Sort\SortHelper;
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
    public function index(Request $request)
    {
        // $roles = Role::all()->sortBy('desc');
        // return view('admin.pages.admin_manage.role_list', ['roles' => $roles]);

        if (empty($request->all())) {
            $roles = Role::all()->sortBy('desc');
            $paginator = new PaginationHelper($roles, 10);
            $items = $paginator->getItem(1);
            return view('Admin.pages.admin_manage.role_list', ['current_page' => 1, 'roles' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $roles = Role::all();
            $result = SortHelper::sort($roles, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.ajax_components.role_table', ['current_page' => $current_page, 'roles' => $items, 'paginator' => $paginator]);
        }
        return abort(404);
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
        $validatedData = $request->validate([
            'name' => 'required|max:25|unique:permissions,name,',
            'permission_list' => 'required',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.unique' => 'Tên quyền đã tồn tại',
            'permisison_list.required' => 'Hành động không được để trống',
        ]);

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
        $role = Role::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:25|unique:permissions,name,' . $role->id,
            'permission_list' => 'required',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.unique' => 'Tên quyền đã tồn tại',
            'permisison_list.required' => 'Hành động không được để trống',
        ]);

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