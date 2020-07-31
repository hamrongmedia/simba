<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductInfo;
use App\Services\ProductService;
use App\Services\UploadService;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';

    const UPLOAD_PRODUCT_IMAGE = 'product_images/';
    const UPLOAD_TEMP_IMAGE = 'temp_image/';
    /**
     * @var request
     */
    protected $request;

    /**
     * @var productService
     */
    protected $productService;

    /**
     * @var uploadService
     */
    protected $uploadService;

    /**
     * @var $pathView
     */
    private $pathView = 'admin.page.';

    public function __construct(
        Request $request,
        UploadService $uploadService,
        ProductService $productService
    ) {
        $this->request = $request;
        $this->productService = $productService;
        $this->uploadService = $uploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return view('admin.pages.product.list');
    }

    public function getTableProduct()
    {
        $products = Product::query()->with('categories');

        return DataTables::eloquent($products)
            ->addColumn('image', function (Product $product) {
                $link = $product->thumbnail;
                $pos = strrpos($link, '/');
                $newstr = substr_replace($link, 'thumbs/', $pos, 0);
                return "<img style='width:100px' src='{$link}' alt='image'>";
            })
            ->addColumn('action', function (Product $product) {
                return '<a href="' . route("admin.product.edit", $product->id) . '">
                <span title="Edit" type="button" class="btn btn-flat btn-primary">
                <i class="fa fa-edit"></i></span></a>&nbsp;
                <span onclick="deleteItem(' . $product->id . ')" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span></td>';
            })
            ->editColumn('categories', function (Product $product) {
                $result = '';
                foreach ($product->categories as $item) {
                    $result = $result . $item->name;
                }
                return $result;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
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
        // $types = ProductType::where('is_deleted', 0)->get();
        $attributes = ProductAttribute::with('attributeValues')->where('is_deleted', 0)->get();
        return view('admin.pages.product.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->product_code = $request->product_code;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->content = $request->content;
            if ($request->images) {
                $product->thumbnail = $request->images;
            }
            $product->stock = $request->stock;
            if ($request->stock_unlimited) {
                $product->stock_unlimited = 1;
            } else {
                $product->stock_unlimited = 0;
            }
            $product->stock = $request->stock;
            if ($request->type) {
                $product->type = Product::PRODUCT_ATTRIBUTE;
            } else {
                $product->type = Product::PRODUCT_STANDARD;
            }
            $product->save();
            # Create Seo Meta
            $this->seoHelper($product, $request);
            # Create Product Category
            $this->productService->storeProductCategory($request, $product);
            # Create Product Attribute
            $this->productService->storeProductAttributeMap($request, $product);
            # Create Product Images
            $product_images = $request->product_images;
            $this->saveProductImage($product, $product_images);
            # Commit all data
            DB::commit();
            if ($product->type = Product::PRODUCT_ATTRIBUTE) {
                return redirect()->route('admin.product.edit', ['id' => $product->id]);
            }
            return redirect()->route('admin.product.index');
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
        $data = Product::where(['delete_flag' => 0, 'id' => $id])->first();
        $attributes = ProductAttribute::where('is_deleted', 0)->get();

        $product_attribute_map = ProductAttribute::with('attributeValues')
            ->join('product_attribute_map', 'product_attributes.id', '=', 'product_attribute_map.product_attribute_id')
            ->where('product_id', $id)
            ->select('product_attributes.name', 'product_attributes.id')
            ->get();

        $product_info = ProductInfo::leftJoin('product_attribute_values as pav1', 'product_info.attribute_value1', '=', 'pav1.id')
            ->leftJoin('product_attribute_values as pav2', 'product_info.attribute_value2', '=', 'pav2.id')
            ->leftJoin('product_color as pc', function ($join) {
                $join->on('product_info.attribute_value1', '=', 'pc.color_id');
                $join->on('product_info.product_id', '=', 'pc.product_id');

            })
            ->where('product_info.product_id', $id)
            ->select(
                'product_info.id',
                'pav1.id as pav1_id',
                'pav1.value as pav1_value',
                'pav2.id as pav2_id',
                'pav2.value as pav2_value',
                'image_path'
            )
            ->get();
        if (isset($data)) {
            return view('admin.pages.product.edit', compact(
                'data',
                'categories',
                'product_attribute_map',
                'product_info',
                'attributes'
            ));
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
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->product_code = $request->product_code;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->content = $request->content;
            if ($request->images) {
                $product->thumbnail = $request->images;
            }
            if ($request->stock_unlimited) {
                $product->stock_unlimited = 1;
            } else {
                $product->stock_unlimited = 0;
            }
            $product->stock = $request->stock;
            if ($request->type) {
                $product->type = Product::PRODUCT_ATTRIBUTE;
            } else {
                $product->type = Product::PRODUCT_STANDARD;
            }
            $product->save();
            # Create Seo Meta
            $this->seoHelper($product, $request);
            # Create Product Category
            $this->productService->storeProductCategory($request, $product);
            # Create Product Attribute
            $this->productService->storeProductAttributeMap($request, $product);
            # Create Product Images
            $product_images = $request->product_images;
            $this->saveProductImage($product, $product_images);
            /** Delete Product Image */
            $delete_images = $request->delete_images;
            $this->deleteImage($product, $delete_images);
            # Commit all data
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
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

        return view('admin.pages.ajax_components.product_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
    }

    /*
     *--------------------------------------------------------------------------
     * Product Save Image
     * @param $product_images
     * @return
     *--------------------------------------------------------------------------
     */
    protected function saveProductImage($product, $product_images = array())
    {
        if (!$product_images) {
            return false;
        }
        $uploadPath = self::UPLOAD_PRODUCT_IMAGE;
        $tempPathImage = self::UPLOAD_TEMP_IMAGE;
        if (!Storage::exists($uploadPath)) {
            Storage::makeDirectory($uploadPath);
        }
        foreach ($product_images as $index => $image) {
            $sort_order = $index + 1;
            $temp_path = $tempPathImage . $image;
            $full_path = $uploadPath . $image;
            $productImage = ProductImage::where('product_id', $product->id)->where('image_file', $image)->first();
            if ($productImage) {
                $productImage->sort_order = $sort_order;
                $productImage->save();
            } elseif (Storage::exists($temp_path)) {
                $productImage = new ProductImage;
                $productImage->product_id = $product->id;
                $productImage->image_file = $full_path;
                $productImage->sort_order = $sort_order;
                $productImage->save();
                Storage::move($temp_path, $full_path);
            }
        }
        $this->deleteImageTemp();
        return true;
    }

    /*
     *--------------------------------------------------------------------------
     * Product Delete Image
     * @param $product_images
     * @return
     *--------------------------------------------------------------------------
     */
    protected function deleteImage($product, $delete_images = [])
    {
        if (is_array($delete_images)) {
            foreach ($delete_images as $delete_image) {
                $productImage = ProductImage::where('product_id', $product->id)->where('image_file', $delete_image)->first();
                if ($productImage) {
                    $productImage->delete();
                    // Remove file in folder upload
                    $uploadPath = self::UPLOAD_PRODUCT_IMAGE;
                    $image_path = $uploadPath . $delete_image;
                    if (Storage::exists($image_path)) {
                        Storage::delete($image_path);
                    }
                }
            }
        }
    }

    /*
     *--------------------------------------------------------------------------
     * Delete Image From Temp Folder
     * @param $product_images
     * @return
     *--------------------------------------------------------------------------
     */
    protected function deleteImageTemp()
    {
        $directory = self::UPLOAD_TEMP_IMAGE;
        $files = Storage::allFiles($directory);
        if ($files) {
            foreach ($files as $file) {
                if (Storage::exists($file)) {
                    Storage::delete($file);
                }
            }
        }
    }

    /*
     *--------------------------------------------------------------------------
     * Product Upload Image
     * @param ProductFormRequest $request
     * @param Int $id
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    protected function uploadImages()
    {
        $uploadPath = self::UPLOAD_TEMP_IMAGE;
        $image = $this->request->file('file');
        $save_name = $this->uploadService->handleUploaded($image, $uploadPath);
        return $this->respond(['success' => true, 'data' => $save_name]);
    }

    /*
     *--------------------------------------------------------------------------
     * Remove Upload Image
     * @param ProductFormRequest $request
     * @param Int $id
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    protected function removeImage()
    {
        $filename = $this->request->get('filename');
        $el_delete = $this->request->get('el_delete');
        $uploadPath = self::UPLOAD_TEMP_IMAGE;
        $image_path = $uploadPath . $el_delete;
        $this->uploadService->handleRemove($image_path);
        return Response::json(['success' => $image_path], 200);
    }
}