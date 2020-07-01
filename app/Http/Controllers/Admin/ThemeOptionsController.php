<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\ThemeOptions;

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
        $obj  = ThemeOptions::where('key','header')->first();
        $value = null;
        if($obj != null) $value = $obj->value;
        return view('admin.pages.theme_config.theme_options',['page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'value'=>$value]);
    }

    //Social Setting
    public function social(Request $request){
        $page_name = "Thiết lập social";
        $_route = route('admin.themeoptions.updatesocial');
        $_form = 'social';
        $obj  = ThemeOptions::where('key','social')->first();
        $value = null;
        if($obj != null) $value = $obj->value;
        return view('admin.pages.theme_config.theme_options',['page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'value'=>$value]);
    }

    public function updatesocial(Request $request){
        $data = $request->all();
        $obj  = ThemeOptions::where('key','social')->first();
        if($obj == null) {
           $obj = ThemeOptions::create(['key'=>'social', 'value'=>$data]);
        }else $obj->update(['value'=>$data]);
        return back();
    }

    //Header Setting
    public function header(Request $request){
        $page_name = "Thiết lập chung";
        $_route = route('admin.themeoptions.updateheader');
        $_form = 'header';
        $obj  = ThemeOptions::where('key','header')->first();
        $value = null;
        if($obj != null) $value = $obj->value;
        return view('admin.pages.theme_config.theme_options',['page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'value'=>$value]);
    }

    public function updateheader(Request $request){
        $data = $request->all();
        $data = json_encode($data);
        $obj  = ThemeOptions::where('key','header')->first();
        if($obj == null) {
           $obj = ThemeOptions::create(['key'=>'header', 'value'=>$data]);
        }else $obj->update(['value'=>$data]);
        return back();
    }

    //Script Setting
    public function script(Request $request){
        $page_name = "Chèn Script vào Header hoặc Footer";
        $_route = route('admin.themeoptions.updatescript');
        $_form = 'script';
        $obj  = ThemeOptions::where('key','script')->first();
        $value = null;
        if($obj != null) $value = ($obj->value;
        return view('admin.pages.theme_config.theme_options',['page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'value'=>$value]);
    }

    public function updatescript(Request $request){
        $data = $request->all();
        $obj  = ThemeOptions::where('key','script')->first();
        if($obj == null) {
           $obj = ThemeOptions::create(['key'=>'script', 'value'=>$data]);
        }else $obj->update(['value'=>$data]);
        return back();
    }

    //Footer Setting
    public function footer(Request $request){
        $page_name = "Cấu hình chân trang";
        $_route = route('admin.themeoptions.updatefooter');
        $_form = 'footer';
        $obj  = ThemeOptions::where('key','footer')->first();
        $value = null;
        if($obj != null) $value = $obj->value;
        return view('admin.pages.theme_config.theme_options',['page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'value'=>$value]);
    }

    public function updatefooter(Request $request){
        $data = $request->all();
        $obj  = ThemeOptions::where('key','footer')->first();
        if($obj == null) {
           $obj = ThemeOptions::create(['key'=>'footer', 'value'=>$data]);
        }else $obj->update(['value'=>$data]);
        return back();
    }
}
