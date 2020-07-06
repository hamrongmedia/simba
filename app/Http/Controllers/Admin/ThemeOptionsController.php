<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeOptions;
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

        $page_name = "THIẾT LẬP CHUNG";
        $_route = route('admin.themeoptions.updateheader');
        $_form = 'header';
        $value = ThemeOptions::get('header');
        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    //Header Setting
    public function header(Request $request)
    {
        $page_name = "THIẾT LẬP CHUNG";
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

    //HomePage Setting
    public function homepage(Request $request)
    {
        $page_name = "THIẾT LẬP TRANG CHỦ";
        $_route = route('admin.themeoptions.updatehomepage');
        $_form = 'homepage';
        $value = ThemeOptions::get('homepage');
        //dd($value);
        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updatehomepage(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('homepage', $data);
        return back();
    }

    //HomePage Setting
    public function product(Request $request)
    {
        $page_name = "THIẾT LẬP SẢN PHẨM";
        $_route = route('admin.themeoptions.updateproduct');
        $_form = 'product';
        $value = ThemeOptions::get('product');
        //dd($value);
        return view('admin.pages.theme_config.theme_options', ['page_name' => $page_name, '_route' => $_route, '_form' => $_form, 'value' => $value]);
    }

    public function updateproduct(Request $request)
    {
        $data = $request->all();
        ThemeOptions::set('product', $data);
        return back();
    }

    //Script Setting
    public function script(Request $request)
    {
        $page_name = "CHÈN SCRIPT VÀO HEADER HOẶC FOOTER";
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
        $page_name = "THIẾT LẬP SOCIAL";
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
        $page_name = "CẤU HÌNH CHÂN TRANG";
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
}