<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = ProductType::where('is_deleted', 0)->get();
        return view('admin.pages.product_type.list', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.product_type.create');
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
        if($request->isMethod('post')){
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
                'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword :  '',
                'meta_title' => isset($request->meta_title) ? $request->meta_title :  '',
                'meta_description' => isset($request->meta_description) ? $request->meta_description :  '',
                'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
                'is_deleted' => 0,
            ];
            $result = ProductType::create($data);
            if($result) Session::flash('success', 'Thêm loại sản phẩm thành công');
            else Session::flash('error', 'Thêm loại sản phẩm không thành công');
            return redirect()->back();
        }
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
        $type = ProductType::where(['is_deleted' => 0, 'id' => $id])->first();
        if(isset($type))return view('admin.pages.product_type.edit', ['type' => $type]);
        else {
            Session::flash('error', 'Không tìm thấy loại sản phẩm');
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
        if($request->isMethod('put')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ],[
                'name.required' => 'Vui lòng nhập tên danh mục',
            ]);
    
            if ($validator->fails()) {
                Session::flash('error', $validator->errors()->first());
                return redirect()->back();
            }
            $category = ProductType::where(['is_deleted' => 0, 'id' => $id])->first();
            if(isset($category)){
                $data = [
                    'name' => $request->name,
                    'slug' => isset($request->slug) ? $request->slug :  Str::slug($request->name, '-'),
                    'description' => isset($request->description) ? $request->description :  '',
                    'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword :  '',
                    'meta_title' => isset($request->meta_title) ? $request->meta_title :  '',
                    'meta_description' => isset($request->meta_description) ? $request->meta_description :  '',
                    'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
                ];
                $result = ProductType::where(['is_deleted' => 0, 'id' => $id])->update($data);
                if($result) Session::flash('success', 'Update loại sản phẩm thành công');
                else Session::flash('error', 'Update loại sản phẩm không thành công');
                return redirect()->back();
            }
            else {
                Session::flash('error', 'Loại sản phẩm không tồn tại');
                return redirect()->route('product-category.index');
            }
        }
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
