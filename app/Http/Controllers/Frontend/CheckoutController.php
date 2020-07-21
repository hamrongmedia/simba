<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;

class CheckoutController extends Controller
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

    /**
     * Show oder form
     * @return Illuminate\Http\Response $response
     *
     */
    public function index()
    {
        $user = $this->guard()->user();
        $cart = $this->cartService->getCarts();
        $cartItems = $cartItems = $this->cartRepository->getListItemCart($this->request, $cart->cart_key, $user);
        return view('front-end.checkout.index',compact('cart','cartItems'));
    }
}
