<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ThemeOptions;
use App\Models\Posts;
use App\Models\PostCategory;

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
            abort(404);
        }
        $content = json_decode($data->value);

        // Get hightline category
        $hightline_cat = PostCategory::where('status',1)->where('id',$content->home6_cat)->first();

        //dd($hightline_cat->posts);
       
        return view('front-end.home')->with(['homepageOption' => $content, 'list_hightline_post'=>$hightline_cat->posts]);
    }
}