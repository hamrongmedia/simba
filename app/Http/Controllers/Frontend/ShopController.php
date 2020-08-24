<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
class ShopController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';
    
    /**
     * @var request
     */
    protected $request;
    
    /**
     * @var productRepository
     */
    protected $productRepository;

    public function __construct(
        Request $request,
        ProductRepository $productRepository
    )
    {
        $this->request = $request;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $datas = $this->productRepository->getListProduct($request);
        if($datas) {
            foreach ($datas as $data) {
                # Get Product Images 
                $img_attr = [];
                if($data->productImage) {
                    foreach ($data->productImage as $pim) {
                        $img_attr[$pim->attribute_value1][] = $pim->image_file;
                    }
                    $data->img_attr = $img_attr;
                }
            }
        }
        return view('front-end.shop.index',compact('datas'));
    }
}
