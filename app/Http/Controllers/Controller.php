<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Log;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Creat Seo
     *
     * @param  Model $data
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function seoHelper($data, $request)
    {
    	$seo = $request->seo;
        Log::info($seo);
    	$meta_title = $request->title;
    	$meta_description = '';
    	if($request->content) {
    		$meta_description = Str::substr(strip_tags($request->content),30);
    	}
    	$meta_keyword = $request->meta_keyword;
    	if(isset($seo['meta_title'])) {
    		$meta_title = $request->meta_title;
    	}
    	if(isset($seo['meta_description'])) {
    		$meta_description = $request->meta_description;
    	}
    	$data->meta_title = $meta_title;
    	$data->meta_keyword = $meta_keyword;
    	$data->meta_description = $meta_description;
    	$data->save();
    	return $data;
    }
}
