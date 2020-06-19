<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Posts;
use App\Admin\Category;

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
        return view('admin.pages.posts.list', ['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('status',1)->get();
        return view('admin.pages.posts.create_post',['cats'=>$cats]);
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
        Posts::create($data);
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
        if($obj == null){
            return redirect()->route('admin.post.index');  
        }
        $cats = Category::where('status',1)->get();
        return view('admin.pages.posts.edit_post',['obj'=>$obj,'cats'=>$cats]);
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
        if($obj == null){
            return redirect()->route('admin.post.index');  
        }
        $obj->update($request->all());
        return redirect()->route('admin.post.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Posts::find($id);
        if($obj == null){
            return redirect()->route('admin.post.index')->with('error', 'Cập nhật thành công');
        }
        $obj->delete();
        return redirect()->route('admin.post.index')->with('success', 'Xóa thông tin thành công'); 
    }
}
