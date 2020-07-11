<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\ProductService;
use DB;

class ProductController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';
    /**
     * @var request
     */
    protected $request;

    /**
     * @var productService
     */
    protected $productService;

    /**
     * @var $pathView
     */
    private $pathView = 'admin.page.';

    public function __construct(
        Request $request,
        ProductService $productService
    )
    {
        $this->request = $request;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (empty($request->all())) {
            $data = Product::all()->sortBy('desc');
            $paginator = new PaginationHelper($data, 1);
            $items = $paginator->getItem(1);
            return view('admin.pages.product.list', ['current_page' => 1, 'data' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $data = Product::all();
            $result = SortHelper::sort($data, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 1);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('admin.pages.ajax_components.product_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
        }
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
        $attributes = ProductAttribute::with('attributeValues')->where('is_deleted', 0)->get();
        return view('admin.pages.product.create',compact('categories','types','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        try {
            $product = New Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->product_code = $request->product_code;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->content = $request->content;
            $product->thumbnail = $request->thumbnail;
            $product->type = 1;
            $product->save();
            # Create Product Category
            $this->productService->storeProductCategory($request, $product);
            # Create Product Images
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
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
        $data = Product::where(['delete_flag' => 0, 'id' => $id])->first();
        $attributes = ProductAttribute::where('is_deleted', 0)->get();
        if (isset($data)) {
            return view('admin.pages.product.edit', compact('data','types','categories','attributes'));
        } else {
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
    public function update(ProductRequest $request, $id)
    {
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
        $result = Product::where('id', $id)->update('is_deleted', 1);
        if ($result) {
            return response(['status' => 1, 'msg' => "Xóa sản phẩm thành công"]);
        } else {
            return response(['status' => 0, 'msg' => "Xóa sản phẩm không thành công"]);
        }

    }

    public function getValue(Request $request)
    {
        $id = $request->id;
        if (isset($id) && $id !== '') {
            $values = ProductAttributeValue::where('attribute_id', $id)->get();
            return response(['data' => $values]);
        }
    }

    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Posts::class, ['title', 'slug'], $data);

        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('Admin.pages.ajax_components.product_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
    }
}