<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function utf8convert($str)
    {

        if (!$str) {
            return false;
        }

        $utf8 = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd' => 'đ|Đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($utf8 as $ascii => $uni) {
            $str = preg_replace("/($uni)/i", $ascii, $str);
        }

        return strtolower($str);

    }

    public function getSuggestions(Request $request)
    {
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $keyword = $this->utf8convert($keyword);
            if ($keyword == '') {
                return [];
            }
        }
        $products = Product::all();
        $product_name = $products->pluck('name');

        $result = $product_name->filter(function ($item) use ($keyword) {
            $item_val = $this->utf8convert($item);
            if (strpos($item_val, $keyword) !== false) {
                return true;
            }
            return false;
        });
        return $result->take(10);
    }

    public function getData(Request $request)
    {

        if (!$request->has('keyword')) {
            return back();
        }
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $keyword = $this->utf8convert($keyword);
            if ($keyword == '') {
                return view('tim_kiem', ['result' => [], 'keyword' => "Không tìm thấy từ khóa!"]);
            }
        }
        $products = Product::all();

        $result = $products->filter(function ($item) use ($keyword) {
            $item_val = $this->utf8convert($item->name);
            if (strpos($item_val, $keyword) !== false) {
                return true;
            }
            return false;
        });
        return view('tim_kiem', ['result' => $result, 'keyword' => $request->keyword]);
    }

}