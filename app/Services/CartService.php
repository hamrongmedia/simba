<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Order\OrderRepository;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartService
{
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
     * @var CartRepository
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
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        OrderRepository $orderRepository
    ) {
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    /**
     * Get Current Customer.
     * @return Customer[]
     */
    protected function getCustomer()
    {
        if ( $this->guard()->check() ) {
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
        if (null !== $this->carts) {
            if ($empty_delete) {
                $cartKeys = [];
                foreach (array_keys($this->carts) as $index) {
                    $Cart = $this->carts[$index];
                    if ($Cart->getItems()->count() > 0) {
                        $cartKeys[] = $Cart->getCartKey();
                    } else {
                        $this->entityManager->remove($this->carts[$index]);
                        $this->entityManager->flush($this->carts[$index]);
                        unset($this->carts[$index]);
                    }
                }

                $this->session->set('cart_keys', $cartKeys);
            }

            return $this->carts;
        }

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
        $customer_id = $this->guard()->id();
        return $this->cartRepository->findBy( 'customer_id' , $customer_id );
    }

    /**
     * Return a session cart
     *
     * @return Cart[]
     */
    public function getSessionCarts()
    {
        $cartKeys = $this->session->get('cart_keys', []);

        if (empty($cartKeys)) {
            return [];
        }

        return $this->cartRepository->findBy(['cart_key' => $cartKeys], ['id' => 'DESC']);
    }

    /**
     * Merge the customer cart held by the member with the non-member cart.
     */
    public function mergeFromPersistedCart()
    {
        $CartItems = [];
        foreach ($this->getCustomerCarts() as $Cart) {
            $CartItems = $this->mergeCartItems($Cart->getCartItems(), $CartItems);
        }

        // セッションにある非会員カートとDBから取得した会員カートをマージする.
        foreach ($this->getSessionCarts() as $Cart) {
            $CartItems = $this->mergeCartItems($Cart->getCartItems(), $CartItems);
        }

        $this->restoreCarts($CartItems);
    }

    /**
     * @return Cart|null
     */
    public function getCart()
    {
        $Carts = $this->getCarts();

        if (empty($Carts)) {
            return null;
        }

        $cartKeys = $this->session->get('cart_keys', []);
        $Cart = null;
        if (count($cartKeys) > 0) {
            foreach ($Carts as $cart) {
                if ($cart->getCartKey() === current($cartKeys)) {
                    $Cart = $cart;
                    break;
                }
            }
        } else {
            $Cart = $Carts[0];
        }

        return $Cart;
    }


    public function addProductCart($product,$quanty=1,$attr=[])
    {
        if (!$product) {
            return false;
        }
        $cartItem = new CartItem();
        $carItem->price = 1 ;
        $cartItem->quantity = 1 ;
        $carItem->save();
    }

    public function removeProductCart()
    {

    }
}
