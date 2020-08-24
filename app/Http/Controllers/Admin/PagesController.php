<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // if (empty($request->all())) {
        //     $data = Pages::all()->sortBy('desc');
        //     $paginator = new PaginationHelper($data, 1);
        //     $items = $paginator->getItem(1);
        //     return view('admin.pages.pages.list', ['current_page' => 1, 'data' => $items, 'paginator' => $paginator]);
        // }

        // if ($request->sort_by) {
        //     $data = Pages::all();
        //     $result = SortHelper::sort($data, $request->sort_by, $request->sort_type);
        //     $paginator = new PaginationHelper($result, 1);
        //     $current_page = $request->current_page ?? 1;
        //     $items = $paginator->getItem($current_page);
        //     return view('admin.pages.ajax_components.page_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
        // }
        // return abort(404);

        $pages = Pages::all()->sortByDesc('id');
        return view('admin.pages.pages.list', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pages.create_page');
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
        Pages::create($data);
        return redirect(route('admin.page.index'));
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
        $obj = Pages::find($id);
        if ($obj == null) {
            return redirect()->route('admin.page.index');
        }
        return view('admin.pages.pages.edit_page', ['obj' => $obj]);
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
        $obj = Pages::find($id);
        if ($obj == null) {
            return redirect()->route('admin.page.index');
        }
        $obj->update($request->all());
        return redirect()->route('admin.page.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Pages::find($request->id)->delete();
        return ['success' => 'Xóa trang thành công!'];
    }

    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Pages::class, ['title', 'slug'], $data);

        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('admin.pages.ajax_components.page_table', ['current_page' => $current_page, 'data' => $items, 'paginator' => $paginator]);
    }
}
