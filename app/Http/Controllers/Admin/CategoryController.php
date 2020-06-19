<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Category::all();
        return view('admin.pages.category.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('status',1)->get();
        return view('admin.pages.category.create_category',['cats'=>$cats]);
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
        Category::create($data);
        return redirect()->route('admin.category.index');
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
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('admin.category.index');  
        }
        $cats = Category::where('status',1)->get();
        return view('admin.pages.category.edit_category',['obj'=>$obj,'cats'=>$cats]);
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
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('admin.category.index');  
        }
        $obj->update($request->all());
        Session::flash('success-category', 'Thay đổi thông tin thành công.');
        return redirect()->route('admin.category.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Category::find($id);
        if($obj == null){
            return redirect()->route('admin.category.index')->with('error', 'Cập nhật thành công');;  
        }
        $obj->delete();
        return redirect()->route('admin.category.index')->with('success', 'Xóa thông tin thành công'); 
    }
}
