<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page_name = "Thiết lập chung";
        $_route = route('admin.themeoptions.updateheader');
        $_form = 'header';
        $value = ThemeOptions::get('header');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    //Header Setting
    public function header(Request $request)
    {
        $page_name = "Thiết lập chung";
        $_route = route('admin.themeoptions.updateheader');
        $_form = 'header';
        $value = ThemeOptions::get('header');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updateheader(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('header', $data);
        return back();
    }


    //Header Setting
    public function homepage(Request $request)
    {
        $page_name = "Thiết lập chung";
        $_route = route('admin.themeoptions.updatehomepage');
        $_form = 'homepage';
        $value = ThemeOptions::get('homepage');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updatehomepage(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('homepage', $data);
        return back();
    }

    //Script Setting
    public function script(Request $request)
    {
        $page_name = "Chèn Script vào Header hoặc Footer";
        $_route = route('admin.themeoptions.updatescript');
        $_form = 'script';
        $value = ThemeOptions::get('script');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updatescript(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('script', $data);
        return back();
    }

        //Social Setting
    public function social(Request $request)
    {
        $page_name = "Thiết lập social";
        $_route = route('admin.themeoptions.updatesocial');
        $_form = 'social';
        $value = ThemeOptions::get('social');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updatesocial(Request $request)
    {
        $data = $request->all();

        ThemeOptions::set('social', $data);

        return back();
    }

    //Footer Setting
    public function footer(Request $request)
    {
        $page_name = "Cấu hình chân trang";
        $_route = route('admin.themeoptions.updatefooter');
        $_form = 'footer';
        $value = ThemeOptions::get('footer');

        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updatefooter(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('footer', $data);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}