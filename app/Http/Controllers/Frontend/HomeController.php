<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Posts;
use App\Models\ProductCategory;
use App\Models\ThemeOptions;

class HomeController extends Controller
{
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


        //dd($hightline_cat->posts);

        return view('front-end.home')->with([
            'homepageOption' => $content,
            'list_hightline_post' => $hightline_cat->posts ?? [],
            'product_cat1' => $product_cat1 ?? null,
            'child_product_cat1' => $product_cat1->subCategory ?? [],
            'product_cat2' => $product_cat2 ?? null,
            'child_product_cat2' => $product_cat2->subCategory ?? [],
        ]);
    }
}