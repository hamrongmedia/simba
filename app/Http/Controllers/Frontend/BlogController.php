<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PostCategory;
use App\Models\Posts;

class BlogController extends Controller
{
    public function getDetailPost($slug)
    {
        $post = Posts::where('status', 1)->where('slug', $slug)->first();
        $new_post = Posts::orderBy('created_at', 'desc')->take(6)->get(); // Bai viet moi nhat
        if ($post == null) {
            abort(404);
        }

        return view('front-end.post.detail')->with(compact(['post', 'new_post']));
    }

    public function getDetailPage($slug)
    {
        $page = Pages::where('status', 1)->where('slug', $slug)->first();
        $new_post = Posts::orderBy('created_at', 'desc')->take(6)->get(); // Bai viet moi nhat
        if ($page == null) {
            abort(404);
        }

        return view('front-end.page.detail')->with(compact(['page', 'new_post']));
    }

    public function getListPostOfCategory($slug)
    {
        $cat = PostCategory::where('status', 1)->where('slug', $slug)->first();
        if ($cat == null) {
            return abort(404);
        }
        $posts = Posts::join('post_has_categories as phc', 'phc.post_id', '=', 'posts.id')
            ->join('post_category', 'post_category.id', '=', 'phc.category_id')
            ->where('post_category.id', '=', $cat->id)
            ->select([
                'posts.*',
                'post_category.id as cat_id',
                'post_category.name',
            ])
            ->groupBy('posts.id')
            ->paginate(3);

        return view('front-end.category.detail', ['posts' => $posts, 'cat' => $cat]);
    }
}