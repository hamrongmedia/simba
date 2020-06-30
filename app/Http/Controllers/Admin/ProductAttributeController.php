<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_attributes = ProductAttribute::where('is_deleted', 0)->get();
        return view('admin.pages.product_attribute.list', ['list_attributes' => $list_attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.product_attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ],[
                'name.required' => 'Vui lòng nhập tên thuộc tính',
            ]);
    
            if ($validator->fails()) {
                Session::flash('error', $validator->errors()->first());
                return redirect()->back();
            }
            $data = [
                'name' => $request->name,
                'type' => '',
                'description' => isset($request->description) ? $request->description :  '',
                'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
                'is_deleted' => 0,
            ];
            $result = ProductAttribute::create($data);
            if($result) Session::flash('success', 'Thêm thuộc tính sản phẩm thành công');
            else Session::flash('error', 'Thêm thuộc tính sản phẩm không thành công');
            if($request->save!='')return redirect()->back();
            else return redirect()->route('product-attribute.index');
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
        $attribute = ProductAttribute::where(['is_deleted' => 0, 'id' => $id])->first();
        return view('admin.pages.product_attribute.detail', ['attribute' => $attribute]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = ProductAttribute::where(['is_deleted' => 0, 'id' => $id])->first();
        if(isset($attribute))return view('admin.pages.product_attribute.edit', ['attribute' => $attribute]);
        else {
            Session::flash('error', 'Không tìm thấy thuộc tính sản phẩm');
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
        if($request->isMethod('put')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ],[
                'name.required' => 'Vui lòng nhập tên thuộc tính',
            ]);
    
            if ($validator->fails()) {
                Session::flash('error', $validator->errors()->first());
                return redirect()->back();
            }
            $category = ProductAttribute::where(['is_deleted' => 0, 'id' => $id])->first();
            if(isset($category)){
                $data = [
                    'name' => $request->name,
                    'description' => isset($request->description) ? $request->description :  '',
                    'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
                ];
                $result = ProductAttribute::where(['is_deleted' => 0, 'id' => $id])->update($data);
                if($result) Session::flash('success', 'Update thuộc tính sản phẩm thành công');
                else Session::flash('error', 'Update thuộc tính sản phẩm không thành công');
                return redirect()->back();
            }
            else {
                Session::flash('error', 'thuộc tính không tồn tại');
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
        $result = ProductAttribute::where('id', $id)->update(['is_deleted'=> 1]);
        if($result) return response(['status' => 1, 'msg' => "Xóa thuộc tính sản phẩm thành công"]);
        else return response(['status' => 0, 'msg' => "Xóa thuộc tính sản phẩm không thành công"]);
    }

    public function createValue(Request $request, $id){
        $attr = ProductAttribute::find($id);
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'value' => 'required',
            ],[
                'value.required' => 'Vui lòng nhập giá trị cho thuộc tính',
            ]);
            if ($validator->fails()) {
                Session::flash('error', $validator->errors()->first());
                return redirect()->back();
            }
            $values = explode(',', $request->value);
            foreach($values as $key => $value){
                $data = [
                    'attribute_id' => $id,
                    'value' => trim($value),
                ];
                $result = ProductAttributeValue::create($data);
                if(!$result) {
                    Session::flash('error', 'Thêm giá trị thuộc tính sản phẩm không thành công');
                    return redirect()->back();
                }
            }
            Session::flash('success', 'Thêm giá trị thuộc tính sản phẩm thành công');
            return redirect()->route('product-attribute.show', $id);
        }
        if(isset($attr))return view('admin.pages.product_attribute.create_value', ['attr' => $attr]);
        else {
            Session::flash('error', 'Không tìm thấy thuộc tính sản phẩm');
            return redirect()->back();
        }
    }
}
