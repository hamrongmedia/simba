<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Posts;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ThemeOptions;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var request
     */
    protected $request;

    /**
     * @var productRepository
     */
    protected $productRepository;

    public function __construct(
        Request $request,
        ProductRepository $productRepository
    ) {
        $this->request = $request;
        $this->productRepository = $productRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = ThemeOptions::where('key', 'homepage')->first();
        if ($data == null) {
            return;
        }
        $content = json_decode($data->value);

        // Get hightline category
        $hightline_cat = PostCategory::where('status', 1)->where('id', $content->home6_cat)->first();
        $product_cat1 = ProductCategory::where('status', 1)->where('id', $content->home7_cat)->first();
        $product_cat2 = ProductCategory::where('status', 1)->where('id', $content->home9_cat)->first();

        $hot_products = array(
            "hot_products1" => Product::where('status', 1)->where('id', $content->home5_product1)->first(),
            "hot_products2" => Product::where('status', 1)->where('id', $content->home5_product2)->first(),
            "hot_products3" => Product::where('status', 1)->where('id', $content->home5_product3)->first(),
            "hot_products4" => Product::where('status', 1)->where('id', $content->home5_product4)->first(),
        );

        $new_products = Product::orderByDesc('id')->take(8)->get();
        // Lấy sản phẩm nổi bật
        $hot_cat = ProductCategory::whereIn('slug', ['san-pham-noi-bat', 'san-pham-hot'])->first();
        if ($hot_cat) {
            $hot_products = $hot_cat->products;
        } else {
            $hot_products = [];
        }

        $hot_products1 = array(
            "hot_products5" => Product::where('status', 1)->where('id', $content->home10_product1)->first(),
            "hot_products6" => Product::where('status', 1)->where('id', $content->home10_product2)->first(),
            "hot_products7" => Product::where('status', 1)->where('id', $content->home10_product3)->first(),
            "hot_products8" => Product::where('status', 1)->where('id', $content->home10_product4)->first(),
        );

        return view('front-end.home')->with([
            'homepageOption' => $content,
            'list_hightline_post' => $hightline_cat->posts ?? [],
            'product_cat1' => $product_cat1 ?? null,
            'single_product_cat1' => $product_cat1->products->sortByDesc('id')->take(8) ?? [],
            'child_product_cat1' => $product_cat1->subCategory ?? [],
            'product_cat2' => $product_cat2 ?? null,
            'single_product_cat2' => $product_cat2->products->sortByDesc('id')->take(8) ?? [],
            'child_product_cat2' => $product_cat2->subCategory ?? [],
            'hot_products' => $hot_products,
            'hot_products1' => $hot_products1,
            'new_products' => $new_products,
        ]);
    }
}