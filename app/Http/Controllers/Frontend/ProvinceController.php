<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ProvinceController extends Controller
{
    /*
    *--------------------------------------------------------------------------
    * Get List City
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function getCities()
	{
        $provinces = DB::table('provinces')->select('id','name')->get();
        return response()->json($provinces); 
	}

    /*
    *--------------------------------------------------------------------------
    * Get List Districts
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function getDistricts(Request $request)
    {
        $provinceID = $request->provinceID;
        $provinces = DB::table('districts')->where('province_id', $provinceID)->select('id','name')->get();
        return response()->json($provinces); 
    }

    /*
    *--------------------------------------------------------------------------
    * Get List Wards
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function getWards (Request $request) {
        if ($request->districtID) {
            $districtID = $request->districtID;
            $wards = DB::table('wards')->where('district_id', $districtID)
                    ->select('id','name')->get();
            return response()->json($wards);
        }
    }
}
