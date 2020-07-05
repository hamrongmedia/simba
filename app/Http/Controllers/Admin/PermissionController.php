<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (empty($request->all())) {
            $permissions = Permission::all()->sortBy('desc');
            $paginator = new PaginationHelper($permissions, 10);
            $items = $paginator->getItem(1);
            return view('Admin.pages.admin_manage.permission_list', ['current_page' => 1, 'permissions' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $permissions = Permission::all();
            $result = SortHelper::sort($permissions, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.ajax_components.permission_table', ['current_page' => $current_page, 'permissions' => $items, 'paginator' => $paginator]);
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
        $actions = Action::all()->sortBy('desc');
        return view('admin.pages.admin_manage.permission_create', ['actions' => $actions]);
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
            'name' => 'required|unique:permissions|max:255',
            'action_list' => 'required',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.unique' => 'Tên quyền đã tồn tại',
            'action_list.required' => 'Hành động không được để trống',
        ]);

        //storage data
        $newPermission = new Permission;
        $newPermission->name = $request->name;
        $newPermission->guard_name = 'admin';
        $newPermission->save();

        foreach ($request->action_list as $action) {
            DB::table('permission_has_action')->insert([
                'permission_id' => $newPermission->id,
                'action_id' => $action,
            ]);
        }
        //redirect
        return redirect()->route('admin.permission.index');
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
        $actions = Action::all()->sortBy('desc');
        $permission = Permission::find($id);
        //dd($permission->actions->contains('id', 1));
        return view('admin.pages.admin_manage.permission_edit', ['permission' => $permission, 'actions' => $actions]);
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

        $permission = Permission::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:25|unique:permissions,name,' . $permission->id,
            'action_list' => 'required',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.unique' => 'Tên quyền đã tồn tại',
            'action_list.required' => 'Hành động không được để trống',
        ]);

        $permission->name = $request->name;
        $permission->save();

        // update relation
        DB::table('permission_has_action')->where('permission_id', $id)->delete();
        foreach ($request->action_list as $action) {
            DB::table('permission_has_action')->insert([
                'permission_id' => $permission->id,
                'action_id' => $action,
            ]);
        }

        return redirect()->back()->with('success', 'Up date success');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Permission::find($request->id)->delete();
        return ['msg' => 'Item deleted'];

    }

}