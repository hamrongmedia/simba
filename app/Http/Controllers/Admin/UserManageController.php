<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserManageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (empty($request->all())) {
            $users = Admin::all()->sortBy('desc');
            $paginator = new PaginationHelper($users, 10);
            $items = $paginator->getItem(1);
            return view('Admin.pages.admin_manage.user_list', ['current_page' => 1, 'users' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $users = Admin::all();
            $result = SortHelper::sort($users, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $erquest->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.ajax_components.user_table', ['current_page' => $current_page, 'users' => $items, 'paginator' => $paginator]);
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
        if (Gate::allows('create-admin')) {
            $permissions = Permission::all()->sortBy('desc');
            $roles = Role::all()->sortBy('desc');
            return view('Admin.pages.admin_manage.user_create', ['permissions' => $permissions, 'roles' => $roles]);
        }
        return redirect()->back()->with('error', 'Action denied');
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
        $new_user = Admin::create($data);
        $this->saveRelationship($request, $new_user);
        //redirect to list user
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Admin::class, ['username', 'email', 'name'], $data);

        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('Admin.pages.ajax_components.user_table', ['current_page' => $current_page, 'users' => $items, 'paginator' => $paginator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $permissions = Permission::all()->sortBy('desc');
        $roles = Role::all()->sortBy('desc');

        return view('Admin.pages.admin_manage.user_edit', ['user' => $user, 'permissions' => $permissions, 'roles' => $roles]);
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
        $data = $request->all();
        $user = Admin::find($id);
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);
        $this->removeAllPermission($user);
        $this->saveRelationship($request, $user);
        return redirect()->back()->with('success', "User updated");
    }

    protected function saveRelationship($request, $new_user)
    {
        $list_permissions_id = [];

        //save role and get permission
        if ($request->roles) {
            foreach ($request->roles as $role_id) {
                $role = Role::find($role_id);
                $permissions = $role->permissions;
                foreach ($permissions as $permission) {
                    array_push($list_permissions_id, $permission->id);
                }
                DB::table('user_has_roles')->insert([
                    'user_id' => $new_user->id,
                    'role_id' => $role_id,
                ]);
            }
        }
        // get custom permission
        if ($request->permissions) {
            $permissions = $request->permissions;
            foreach ($request->permissions as $permission_id) {
                array_push($list_permissions_id, (int) $permission_id);
            }
        }

        $list_permissions = array_unique($list_permissions_id);

        //save permissions
        foreach ($list_permissions as $permission_id) {
            DB::table('user_has_permissions')->insert([
                'user_id' => $new_user->id,
                'permission_id' => $permission_id,
            ]);
        }
    }

    protected function removeAllPermission($user)
    {
        DB::table('user_has_roles')->where('user_id', $user->id)->delete();
        DB::table('user_has_permissions')->where('user_id', $user->id)->delete();
    }

    public function delete(Request $request)
    {
        Admin::find($request->id)->delete();
        return ['msg' => 'Item deleted'];

    }

}