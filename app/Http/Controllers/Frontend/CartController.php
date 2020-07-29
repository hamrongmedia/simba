<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
use App\Services\CartService;
use Illuminate\Http\Request;

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
    ) {
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
        $data = Product::where('id', $request->productId)->first();
        if (!$data) {
            return $this->respondWithError('Không tồn tại sản phẩm');
        }

        $cart = $this->cartService->addProductCart($data, $request);
        $user = $this->guard()->user();
        $cartItems = $this->cartRepository->getListItemCart($request, $cart['cart_key'], $user);
        $view = view("front-end.cart.cart_mini", compact('cart', 'cartItems'))->render();
        return $this->respondJsonData('Thêm mới giỏ hàng thành', $view);
    }

    /*
     *--------------------------------------------------------------------------
     * Remove Product Cart Ajax
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    public function removeCartAjax(Request $request)
    {
        $cart_item_id = $request->input('cart_item_id');
        $cart = $this->cartService->removeCartItem($cart_item_id);
        if ($cart) {
            return response()->json(array(
                'status' => true,
            ));
        }
    }
}