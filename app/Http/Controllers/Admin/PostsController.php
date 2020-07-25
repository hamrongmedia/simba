<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Posts;
use DataTables;
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
    public function index(Request $request)
    {
        return view('admin.pages.posts.list');

        // if (empty($request->all())) {
        //     // $data = Posts::all()->sortBy('desc');
        //     // $paginator = new PaginationHelper($data, 1);
        //     // $items = $paginator->getItem(1);
        //     return view('admin.pages.posts.list', ['current_page' => 1, 'data' => $items, 'paginator' => $paginator]);
        // }

        // if ($request->sort_by) {
        //     $data = Posts::all();
        //     $result = SortHelper::sort($data, $request->sort_by, $request->sort_type);
        //     $paginator = new PaginationHelper($result, 1);
        //     $current_page = $request->current_page ?? 1;
        //     $items = $paginator->getItem($current_page);
        //     return view('admin.pages.ajax_components.post_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
        // }
    }

    public function listPost()
    {
        $posts = Posts::query();

        return DataTables::eloquent($posts)
            ->addColumn('action', function ($post) {
                return '<a href="' . route("admin.post.edit", $post->id) . '">
                <span title="Edit" type="button" class="btn btn-flat btn-primary">
                <i class="fa fa-edit"></i></span></a>&nbsp;
                <span onclick="deleteItem(' . $post->id . ')" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span></td>';
            })
            ->editColumn('status', function ($post) {
                if ($post->status == 1) {
                    return '<span class="label label-success">Đang sử dụng</span>';
                }
                return '<span class="label label-danger">Ngừng sử dụng</span>';
            })
            ->addColumn('categories', function ($post) {
                $result = '';
                foreach ($post->category as $category) {
                    $result = $result . '<br><span>' . $category->name . '</span>';
                }
                return $result;
            })
            ->editColumn('image', function ($post) {
                return '<img src="' . $post->image . '" style="max-width: 200px;">';
            })
            ->rawColumns(['action', 'status', 'image', 'categories'])
            ->make(true);
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
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
        ],
            [
                'slug.unique' => 'Slug đã tồn tại',
            ]
        );

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
    public function delete(Request $request)
    {
        $post = Posts::find($request->id);
        $this->authorize('delete', $post);
        $post->delete();
        return ['msg' => 'Item deleted'];
    }

    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Posts::class, ['title', 'slug'], $data);

        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('admin.pages.ajax_components.post_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
    }
}