<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_menu = Menu::all();
        //dd($list_menu->child);
        return view('admin.pages.admin_manage.menu_tree', ['list_menu' => $list_menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Menu::create($data);
        return redirect()->back()->with('success', 'Thêm mới menu thành công');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Menu::find($request->id)->delete();
        return ['message' => 'Xóa thành công menu'];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTree(Request $request)
    {
        $data = $request->jsonData;
        $result = [];
        function getMenuAndParent($result = [], $array, $parent_id)
        {
            foreach ($array as $key => $item) {
                //return $item['id'];
                array_push($result, ['id' => $item['id'], 'parent_id' => $parent_id, 'sort' => $key + 1]);
                if (array_key_exists('children', $item)) {
                    array_push($result, ...getMenuAndParent([], $item['children'], $item['id']));
                }
            }
            return $result;
        }

        $result = getMenuAndParent([], $data, null);
        foreach ($result as $item) {
            $menu = Menu::find($item['id']);
            $menu->parent_id = $item['parent_id'];
            $menu->sort = $item['sort'];
            $menu->save();
        }
        return $result;

    }
}