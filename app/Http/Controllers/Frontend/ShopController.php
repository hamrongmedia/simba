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
        dd($datas);
        if($datas) {
            foreach ($datas as $data) {
                # Get Product Images 
                
            }
        }
        return view('front-end.shop.index',compact('datas'));
    }
}
