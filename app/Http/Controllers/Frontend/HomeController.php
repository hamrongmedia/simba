<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ThemeOptions;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = ThemeOptions::where('key', 'homepage')->first();
        if ($data == null) {
            abort(404);
        }

        $content = json_decode($data->value);
        return view('front-end.home')->with(['homepageOption' => $content]);
    }
}