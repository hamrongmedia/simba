<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Posts;
use DB;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Posts::all();
        return view('admin.pages.posts.list', ['data' => $objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Posts::class);
        $cats = PostCategory::where('status', 1)->get();
        return view('admin.pages.posts.create_post', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Posts::class);

        $data = $request->all();
        $new_post = Posts::create($data);
        $cats = $request->cat_id;

        if ($cats) {
            foreach ($cats as $cat_id) {
                DB::table('post_has_categories')->insert(
                    [
                        'post_id' => $new_post->id,
                        'category_id' => $cat_id,
                    ]
                );
            }
        }

        return redirect(route('admin.post.index'));
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
        $obj = Posts::find($id);
        if ($obj == null) {
            return redirect()->route('admin.post.index');
        }

        $cats = PostCategory::where('status', 1)->get();

        return view('admin.pages.posts.edit_post', ['obj' => $obj, 'cats' => $cats]);
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
        $obj = Posts::find($id);
        if ($obj == null) {
            return redirect()->route('admin.post.index');
        }
        $obj->update($request->all());

        $cats = $request->cat_id;

        if ($cats) {
            //delete relation
            DB::table('post_has_categories')->where('post_id', $obj->id)->delete();
            // add new relation
            foreach ($cats as $cat_id) {
                DB::table('post_has_categories')->insert(
                    [
                        'post_id' => $obj->id,
                        'category_id' => $cat_id,
                    ]
                );
            }
        }

        return redirect()->route('admin.post.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Posts::find($request->id);
        $this->authorize('delete', $post);
        $post->delete();
        return ['msg' => 'Item deleted'];
    }
}