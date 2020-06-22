<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ProductCategory::where('is_deleted', 0)->get();
        return view('admin.pages.product_category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ProductCategory::where('is_deleted', 0)->get();
        return view('admin.pages.product_category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return redirect()->back();
        }
        $data = [
            'name' => $request->name,
            'slug' => isset($request->slug) ? $request->slug :  Str::slug($request->name, '-'),
            'description' => isset($request->description) ? $request->description :  '',
            'parent_category' => isset($request->parent_category) ? $request->parent_category :  null,
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword :  '',
            'meta_title' => isset($request->meta_title) ? $request->meta_title :  '',
            'meta_description' => isset($request->meta_description) ? $request->meta_description :  '',
            'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
            'is_deleted' => 0,
            'view' => 0,
        ];
        $result = ProductCategory::create($data);
        if($result) Session::flash('success', 'Thêm danh mục sản phẩm thành công');
        else Session::flash('error', 'Thêm danh mục sản phẩm không thành công');
        return redirect()->back();
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
        $categories = ProductCategory::where('is_deleted', 0)->get();
        $category = ProductCategory::where(['is_deleted' => 0, 'id' => $id])->first();
        if(isset($category))return view('admin.pages.product_category.edit', ['category' => $category, 'categories' => $categories]);
        else {
            Session::flash('error', 'Không tìm thấy danh mục sản phẩm');
            return redirect()->back();
        }
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

    public function getSubCategories($id){

    }
}
