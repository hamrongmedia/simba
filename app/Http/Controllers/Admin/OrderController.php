<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DataTables;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.order.list');
    }

    public function listOrder()
    {
        $orders = Order::query()->select('orders.*')->with('paymentMethod');

        return DataTables::eloquent($orders)
            ->addColumn('action', function ($order) {
                return '<a href="' . route("admin.order.edit", $order->id) . '">
            <span title="Edit" type="button" class="btn btn-flat btn-primary">
            <i class="fa fa-edit"></i></span></a>&nbsp;
            <span onclick="deleteItem(' . $order->id . ')" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span></td>';
            })
            ->editColumn('status', function (Order $order) {
                switch ($order->status) {
                    case 1:
                        return '<span class="label label-success">' . $order->status->name . '</span>';
                    case 2:
                        return '<span class="label label-info">' . $order->status->name . '</span>';
                    case 3:
                        return '<span class="label label-primary">' . $order->status->name . '</span>';
                    case 4:
                        return '<span class="label label-danger">' . $order->status->name . '</span>';
                    default:
                        return '<span class="label label-default">' . 'Không rõ' . '</span>';}

                if ($order->orderStatus) {
                    return $order->orderStatus->name;
                }
                return '';
            })
            ->editColumn('payment_method', function (Order $order) {
                return $order->paymentMethod->name;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.order.detail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}