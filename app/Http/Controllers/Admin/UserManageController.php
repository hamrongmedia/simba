<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use DataTables;
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
        return view('admin.pages.admin_manage.user_list');
    }

    public function listUsers()
    {
        $users = Admin::query();

        return DataTables::eloquent($users)
            ->addColumn('action', function ($user) {
                return '<a href="' . route("admin.user.edit", $user->id) . '">
                <span title="Edit" type="button" class="btn btn-flat btn-primary">
                <i class="fa fa-edit"></i></span></a>&nbsp;
                <span onclick="deleteItem(' . $user->id . ')" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span></td>';
            })
            ->addColumn('roles', function ($user) {
                $result = '';
                if ($user->roles) {
                    foreach ($user->roles as $role) {
                        $result = $result . '<span class="label label-success">' . $role->name . '</span>';
                    }
                }
                return $result;
            })
            ->addColumn('permissions', function ($user) {
                $result = '';
                if ($user->permissions) {
                    foreach ($user->permissions as $permission) {
                        $result = $result . '<span class="label label-success">' . $permission->name . '</span>';
                    }
                }
                return $result;
            })

            ->rawColumns(['action', 'roles', 'permissions'])
            ->make(true);
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
            return view('admin.pages.admin_manage.user_create', ['permissions' => $permissions, 'roles' => $roles]);
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
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50|unique:admin',
            'email' => 'email:rfc',
            'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.min' => 'Tên tối thiểu 3 ký tự',
            'name.max' => 'Tên tối đa 50 ký tự',

            'username.required' => 'Trường username không được để trống',
            'username.min' => 'Tên tối thiểu 3 ký tự',
            'username.max' => 'Tên tối đa 50 ký tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',

            'email.email' => 'Email không đúng định dạng',

            'password.min' => 'Mật khẩu tối thiểu 5 ký tự',
            'password.required_with' => 'Mật khẩu không được để trống',
            'password.same' => 'Mật khẩu xác nhận không đúng',

            'password_confirmation' => 'Mật khẩu xác nhận không đúng',
        ]);

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

        return view('admin.pages.ajax_components.user_table', ['current_page' => $current_page, 'users' => $items, 'paginator' => $paginator]);
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

        return view('admin.pages.admin_manage.user_edit', ['user' => $user, 'permissions' => $permissions, 'roles' => $roles]);
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
        $user = Admin::findOrFail($id);
        //Validate form
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50|unique:admin,username,' . $user->id,
            'email' => 'email:rfc',
            'password' => 'nullable|min:5|same:password_confirmation',
            'password_confirmation' => 'nullable|min:5',
        ], [
            'name.required' => 'Trường tên không được để trống',
            'name.min' => 'Tên tối thiểu 3 ký tự',
            'name.max' => 'Tên tối đa 50 ký tự',

            'username.required' => 'Trường username không được để trống',
            'username.min' => 'Tên tối thiểu 3 ký tự',
            'username.max' => 'Tên tối đa 50 ký tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',

            'password.same' => 'Mật khẩu xác nhận không đúng',

            'email.email' => 'Email không đúng định dạng',
        ]);

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