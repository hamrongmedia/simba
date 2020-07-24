<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
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
        if (empty($request->all())) {
            $data = PostCategory::all()->sortBy('desc');
            $paginator = new PaginationHelper($data, 1);
            $items = $paginator->getItem(1);
            return view('admin.pages.category.list', ['current_page' => 1, 'data' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $data = PostCategory::all();
            $result = SortHelper::sort($data, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 1);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('admin.pages.ajax_components.category_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
        }
        return abort(404);
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
