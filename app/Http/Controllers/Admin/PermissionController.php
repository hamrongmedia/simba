<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
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
        // $permissions = Permission::all()->sortBy('desc');
        // //dd($permissions);
        // $paginator = new PaginationHelper($permissions, 2);
        // dd($paginator->getitem(3));
        // return view('admin.pages.admin_manage.permission_list', ['permissions' => $permissions]);

        if (empty($request->all())) {
            $permissions = Permission::all()->sortBy('desc');
            $paginator = new PaginationHelper($permissions, 2);
            return view('Admin.pages.admin_manage.permission_list', ['current_page' => 1, 'permissions' => $permissions, 'paginator' => $paginator]);
        }

        if ($request->sort_field) {
            if ($request->sort_type == 'desc') {
                $result = Permission::all()->sortByDesc($request->sort_field);
            } else {
                $result = Permission::all()->sortBy($request->sort_field);
            }
            $paginator = new PaginationHelper($result, 1);
            return view('Admin.pages.ajax_components.permission_table', ['current_page' => 5, 'permissions' => $result, 'paginator' => $paginator]);
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
        $permission = Permission::find($id);
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