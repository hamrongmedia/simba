<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use DataTables;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.category.list');
    }

    public function listCategories()
    {
        $categories = PostCategory::with('parent')->select('post_category.*');

        return DataTables::eloquent($categories)
            ->addColumn('action', function ($category) {
                return '<a href="' . route("admin.category.edit", $category->id) . '">
                <span title="Edit" type="button" class="btn btn-flat btn-primary">
                <i class="fa fa-edit"></i></span></a>&nbsp;
                <span onclick="deleteItem(' . $category->id . ')" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span></td>';
            })
            ->editColumn('status', function ($category) {
                if ($category->status == 1) {
                    return '<span class="label label-success">Đang sử dụng</span>';
                }
                return '<span class="label label-danger">Ngừng sử dụng</span>';
            })
            ->addColumn('parent', function ($category) {
                if ($category->parent) {
                    return '<span>' . $category->parent->name ?? '' . '</span>';
                }
                return '';
            })
            ->rawColumns(['action', 'status', 'parent'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = PostCategory::all();
        return view('admin.pages.category.create_category', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        PostCategory::create($data);
        return redirect()->route('admin.category.index');
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
        $obj = PostCategory::find($id);
        if ($obj == null) {
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');
            return redirect()->route('admin.category.index');
        }
        $cats = PostCategory::where('status', 1)->get();
        return view('admin.pages.category.edit_category', ['obj' => $obj, 'cats' => $cats]);
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
        $obj = PostCategory::find($id);
        if ($obj == null) {
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');
            return redirect()->route('admin.category.index');
        }
        $obj->update($request->all());
        Session::flash('success-category', 'Thay đổi thông tin thành công.');
        return redirect()->route('admin.category.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        PostCategory::find($request->id)->delete();
        return ['msg' => 'Item deleted'];
    }

    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Pages::class, ['title', 'slug'], $data);

        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('admin.pages.ajax_components.category_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
    }
}