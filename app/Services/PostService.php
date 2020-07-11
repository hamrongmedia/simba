<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostCategory;
use App\Models\PostTag;

class PostService
{
    /**
     * @param Request $request
     * @param Post $post
     *
     * @return mixed|void
     */
    public function storePostCategory(Request $request,Post $post)
    {
        $categories = $request->input('categories');
        if (!empty($categories)) {
            $post->categories()->detach();
            foreach ($categories as $category) {
                $post->categories()->attach($category);
            }
        }
    }

    /**
     * @param Request $request
     * @param Post $post
     *
     * @return mixed|void
     */
    public function storePostTag(Request $request, Post $post)
    {

    }
}
