<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductToCategory;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::where('is_deleted', 0)->get();
        return view('admin.pages.product.list', ['products' => $products]);
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
        $types = ProductType::where('is_deleted', 0)->get();
        return view('admin.pages.product.create', ['categories' => $categories, 'types' => $types]);
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
                'categories' => 'required|array|min: 1',
                'type' => 'required|numeric',
                'description' => 'required',
                'price' => 'required|numeric',
                'promotion_price' => 'numeric',
                "images" => 'required|array|min: 1',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ],[
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'categories.required' => 'Vui lòng chọn danh mục sản phẩm',
                'categories.min' => 'Vui lòng chọn danh mục sản phẩm',
                'type.required' => 'Vui lòng chọn loại sản phẩm',
                'description.required' => 'Vui lòng nhập mô tả sản phẩm',
                'price.required' => 'Vui lòng nhập giá sản phẩm',
                'price.numeric' => 'Giá sản phẩm chỉ được nhập số',
                'promotion_price.numeric' => 'Giá sản phẩm chỉ được nhập số',
            ]);
            if ($validator->fails()) {
                Session::flash('error', $validator->errors()->first());
                return redirect()->back();
            }
            $attrs = [];
            foreach($request->attribute as $key => $attr){
                $attrs[$attr] = $request->value[$key];
            }
            $images = [];
            foreach($request->file('images') as $key => $image){
                if($image->isValid()){
                    $fileExtension = $image->getClientOriginalExtension();
                    $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
                    $uploadPath = public_path('/images/product/');
                    $image->move($uploadPath, $fileName);
                    $images[] = '/images/product/' . $fileName;
                }
            } 
            $data = [
                'name' => $request->name,
                'code' => isset($request->code) ? $request->code : '',
                'slug' => isset($request->slug) ? $request->slug :  Str::slug($request->name, '-'),
                'type_id' => $request->type,
                'price' => $request->price,
                'attribute' => json_encode($attrs),
                'images' => json_encode($images),
                'promotion_price' => $request->promotion_price,
                'quantity' => isset($request->quantity) ? $request->quantity : 0,
                'description' => isset($request->description) ? $request->description :  '',
                'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword :  '',
                'meta_title' => isset($request->meta_title) ? $request->meta_title :  '',
                'meta_description' => isset($request->meta_description) ? $request->meta_description :  '',
                'status' => isset($request->status) && $request->status == 'on' ? 1 : 0,
                'is_deleted' => 0,
                'view' => 0,
            ];
            $result = Product::create($data);
            foreach($request->categories as $key => $category){
                ProductToCategory::create([
                    'product_id' => $result->id,
                    'category_id' => $category,
                    'status' => 1,
                    'is_deleted' => 0
                ]);
            }
            if($result) Session::flash('success', 'Thêm sản phẩm thành công');
            else Session::flash('error', 'Thêm sản phẩm không thành công');
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
        $categories = ProductCategory::where('is_deleted', 0)->get();
        $types = ProductType::where('is_deleted', 0)->get();
        $product = Product::where(['is_deleted' => 0, 'id' => $id])->first();
        if(isset($product))return view('admin.pages.product.edit', ['product' => $product, 'types' => $types, 'categories' => $categories]);
        else {
            Session::flash('error', 'Không tìm thấy sản phẩm');
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
        $category = ProductCategory::where(['is_deleted' => 0, 'id' => $id])->first();
    }

    public function getValue(Request $request){
        $id = $request->id;
        if(isset($id) && $id !==''){
            $values = ProductAttributeValue::where('attribute_id', $id)->get();
            return response(['data' => $values]);
        }
    }
}
