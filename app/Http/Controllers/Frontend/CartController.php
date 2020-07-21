<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
class CartController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';
    
    /**
     * @var request
     */
    protected $request;

    /**
     * @var cartRepository
     */
    protected $cartRepository;
    
    /**
     * @var productRepository
     */
    protected $productRepository;

    /**
     * @var cartService;
     */
    protected $cartService;

    public function __construct(
        Request $request,
        CartService $cartService,
        CartRepository $cartRepository,
        ProductRepository $productRepository
    )
    {
        $this->request = $request;
        $this->cartService = $cartService;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        
    }

	public function store(Request $request)
	{
        $data = Product::where('id',$request->productId)->first();
        if(!$data) return $this->respondWithError('Không tồn tại sản phẩm');
        $cart = $this->cartService->addProductCart($data,$request);
        $user = $this->guard()->user();
        $cartItems = $this->cartRepository->getListItemCart($request, $cart['cart_key'], $user);
        $view = view("front-end.cart.cart_mini",compact('cart','cartItems'))->render();
        return $this->respondJsonData('Thêm mới giỏ hàng thành',$view);   
	}

    /*
    *--------------------------------------------------------------------------
    * Remove Product Cart Ajax
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function removeCartAjax(Request $request)
    {
        $product_id = $request->input('product_id');
        $data = $this->productRepository->getById($product_id);
        $cart = $this->cartService->removeProductCart($data);
        if($cart) {
            return response()->json(array(
                'status' => true
            ));
        }
    }
}
