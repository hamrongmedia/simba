<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response as Res;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class SlugController extends Controller
{
    /**
     * @var statusCode
     */
    protected $statusCode = Res::HTTP_OK;
    protected $model = Res::HTTP_OK;

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
        return response()->json($data, $this->getStatusCode(), $headers);
    }


    protected function createSlug($model,$slug)
    {
        $baseSlug = $slug;
        $index = 1;
        while ($this->checkIfExistedSlug($model,$slug)) {
            $slug = $baseSlug . '-' . $index++;
        }
        if (empty($slug)) {
            $slug = time();
        }
        return $slug;
    }

    protected function checkIfExistedSlug($model,$slug)
    {
		switch ($model) {
			case 'product':
				$model = Product::class;
				break;
			default:
				# code...
				break;
        }
        $count = $model::where('slug',$slug)->count();
        return $count > 0;
    }

    /*
    *--------------------------------------------------------------------------
    * Create Slug Model
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    *--------------------------------------------------------------------------
    */
	public function store(Request $request)
	{
        $model = $request->get('model');
        $name = $request->get('name');
        $slug = Str::slug($name);
        $createSlug = $this->createSlug($model,$slug);
        $response = array(
            'status' => true,
            'data'   => $createSlug
        );
        return $this->respond($response);
	}
}
