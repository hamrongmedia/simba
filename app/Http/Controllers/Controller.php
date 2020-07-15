<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Response as Res;
use Response;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * @var int
     */
    protected $statusCode = Res::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $message
     * @return json response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Base Response Api
     * @param Object: $data
     * @param $Respond Json
     * @return json response
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * Return Response With Error
     * @param $message
     * @return json response
     */
    public function respondJsonData($msg,$data)
    {
        $response = [];
        $response['status'] = true;
        $response['msg'] = $msg;
        $response['data'] = $data;
        return $this->respond($response);
    }

    /**
     * Return Response With Error
     * @param $message
     * @return json response
     */
    public function respondWithError($msg)
    {
        $response = [];
        $response['status'] = false;
        $response['msg'] = $msg;
        return $this->respond($response);
    }

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
    	$meta_title = $request->name;
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
