<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Pages;
use App\Models\PostCategory;

class BlogController extends Controller
{
    public function getDetailPost($slug) {
        $post = Posts::where('status',1)->where('slug', $slug)->first();
        if($post == null) abort(404);
        // $cat = $post->category;
        // if($cat == null) abort(404);
        return view('front-end.post.detail')->with(compact(['post']));
    }


    public function getDetailPage($slug) {
        $page = Pages::where('status',1)->where('slug', $slug)->first();
        if($page == null) abort(404);
        return 	view('front-end.page.detail')->with(compact(['page']));
    }

    public function getListPostOfCategory($slug) {
        $cat = PostCategory::where('status',1)->where('slug',$slug)->first();
        if($cat == null) return abort(404);
        return view('front-end.category.detail',['posts'=>$cat->posts, 'cat'=>$cat]);
    }
}
