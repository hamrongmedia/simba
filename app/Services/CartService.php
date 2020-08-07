<?php
namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartService
{
    /**
     * @var request
     */
    protected $request;

    /**
     * @var Cart[]
     */
    protected $carts;

    /**
     * @var ItemHolderInterface
     *
     * @deprecated
     */
    protected $cart;

    /**
     * @var cartRepository
     */
    protected $cartRepository;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * CartService constructor.
     *
     * @param ProductRepository $productRepository
     * @param CartRepository $cartRepository
     */
    public function __construct(
        Request $request,
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        OrderRepository $orderRepository
    ) {
        $this->request = $request;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get Current Customer.
     * @return Customer[]
     */
    protected function getCustomer()
    {
        if ($this->guard()->check()) {
            return $this->guard()->user();
        }
        return false;
    }

    /**
     * Get the current cart array.
     * If the member of this service instance is empty, get cart from DB or session
     * @param bool empty_delete If true, delete item cart if empty cart exists
     * @return Cart[]
     */
    public function getCarts($empty_delete = false)
    {
        if ($this->getCustomer()) {
            $this->carts = $this->getCustomerCarts();
        } else {
            $this->carts = $this->getSessionCarts();
        }
        return $this->carts;
    }

    /**
     * Return a customer cart
     *
     * @return Cart[]
     */
    public function getCustomerCarts()
    {
        $user_id = $this->guard()->id();
        return $this->cartRepository->findBy('user_id', $user_id);
    }

    /**
     * Return a session cart
     *
     * @return Cart[]
     */
    public function getSessionCarts()
    {
        $cart_key = $this->request->session()->get('cart_key');
        if (empty($cart_key)) {
            return [];
        }

        return $this->cartRepository->findBy(['cart_key' => $cart_key], ['id' => 'DESC']);
    }

    protected function createCartKey($user_id = null)
    {
        do {
            $random = Str::random(32);
            $cartKey = $random;
            $Cart = $this->cartRepository->findBy('cart_key', $cartKey);
        } while ($Cart);
        $this->request->session()->put('cart_key', $cartKey);
        return $cartKey;
    }

    protected function createCartByCustomer($user_id)
    {
        $cartKey = $this->createCartKey($user_id);
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->cart_key = $cartKey;
        $cart->total_price = 0;
        $cart->save();
        return $cart;
    }

    protected function updateCart($user_id, $total_price)
    {
        $cart = $this->getCarts();
        if ($cart) {
            $cart->total_price = $total_price;
            $cart->save();
        }
        return $cart;
    }

    public static function getTotalQuantityCart()
    {
        $total_quantity_cart = 0;
        //$cart = $this->getCarts();
        if ($cart) {
            $total_quantity_cart = CartItem::where('cart_id', $cart->id)->sum('quantity');
        }
        return $total_quantity_cart;
    }

    public function addProductCart($product, $request)
    {
        $quantity = $request->quantity;
        $attribute_value1 = $request->colorId;
        $attribute_value2 = $request->sizeId;
        $user_id = $this->guard()->id();
        $cart = $this->getCarts();
        if (!$cart) {
            $cart = $this->createCartByCustomer($user_id);
        }
        if (!$product) {
            return false;
        }
        $whereData = [
            ['cart_id', $cart->id],
            ['product_id', $product->id],
            ['attribute_value1', $attribute_value1],
            ['attribute_value2', $attribute_value2],
        ];
        $product_cart = CartItem::where($whereData)->first();
        if ($product_cart) {
            $quantity = $product_cart->quantity + 1;
        }
        $price = $product->price;
        if($product->sale_price) {
            $price = $product->sale_price;
        }
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product->id, 'attribute_value1' => $attribute_value1, 'attribute_value2' => $attribute_value2],
            ['price' => $price, 'quantity' => $quantity]
        );
        $datas = [];
        # Sum Quantity Product
        $total_quantity = CartItem::where('cart_id', $cart->id)->sum('quantity');
        $total_price = CartItem::where('cart_id', $cart->id)->get()->sum(function ($t) {
            return $t->price * $t->quantity;
        });
        # Update Cart
        $cart = $this->updateCart($user_id, $total_price);
        $datas['cart_key'] = $cart->cart_key;
        $datas['total_quantity'] = $total_quantity;
        $datas['total_price'] = $total_price;
        return $datas;
    }

    public function updateQuantityProductCart($product, $quantity = 1)
    {
        $user_id = $this->guard()->id();
        $cart = $this->getCarts();
        if (!$product) {
            return false;
        }
        $whereData = [
            ['cart_id', $cart->id],
            ['product_id', $product->id],
            ['attribute_value1', $attribute_value1],
            ['attribute_value2', $attribute_value2],
        ];
        # Get Price Discount
        $price = $product->price;
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product->id],
            ['price' => $price, 'quantity' => $quantity]
        );
        $datas = [];
        # Sum Quantity Product
        $total_quantity = CartItem::where('cart_id', $cart->id)->sum('quantity');
        $total_price = CartItem::where('cart_id', $cart->id)->get()->sum(function ($t) {
            return $t->price * $t->quantity;
        });
        # Update Cart
        $cart = $this->updateCart($user_id, $total_price);
        $datas['cart_key'] = $cart->cart_key;
        $datas['total_quantity'] = $total_quantity;
        $datas['total_price'] = $total_price;
        return $datas;
    }

    public function removeCartItem($cart_item_id)
    {
        $user_id = $this->guard()->id();
        $cart = $this->getCarts($user_id);
        if (!$cart_item_id) {
            return false;
        }
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('id', $cart_item_id)
            ->delete();
        # Sum Quantity Product
        $total_price = CartItem::where('cart_id', $cart->id)->get()->sum(function ($t) {
            return $t->price * $t->quantity;
        });
        # Update Cart
        $cart = $this->updateCart($user_id, $total_price);
        return true;
    }

    public function removeProductCart($product)
    {
        $user_id = $this->guard()->id();
        $cart = $this->getCarts($user_id);
        if (!$product) {
            return false;
        }
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->delete();
        # Sum Quantity Product
        $total_price = CartItem::where('cart_id', $cart->id)->get()->sum(function ($t) {
            return $t->price * $t->quantity;
        });
        # Update Cart
        $cart = $this->updateCart($user_id, $total_price);
        return true;
    }

    public function clearCart()
    {
        $user_id = $this->guard()->id();
        $cart = $this->getCarts();
        if (!$cart) {
            return false;
        }
        $cartItem = CartItem::where('cart_id', $cart->id)->delete();
        $cart->delete();
        return true;
    }
}