<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Show oder form
     * @return Illuminate\Http\Response $response
     *
     */
    public function showOrderForm()
    {
        return view('front-end.page.cart');
    }

    /**
     * Show oder form
     * @param Illuminate\Http\Request $request
     *
     */

    public function storeOrder(Request $request)
    {
        //validate form

        //store data

        //redirect if success
        return redirect('product.orderSuccess');
    }

    /**
     * Show success
     * @return Illuminate\Http\Response $response
     *
     */
    public function storeSuccessNotify()
    {
        return view('front-end.page.order-success');
    }

    /**
     * Send mail to customer
     * @param Illuminate\Http\Request $request
     *
     */

    public function sendOderSuccessMail()
    {
        // validate from

        //send mail
        //Mail::to($request->email, new OderSuccessMail(param) )

        return view('front-end.page.order-success');
    }

}