<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use DataTables;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * @var orderRepository
     */
    protected $orderRepository;

    /**
     * @var cartService;
     */
    protected $cartService;

    /**
     * @var orderService;
     */
    protected $orderService;

    public function __construct(
        Request $request,
        OrderRepository $orderRepository
    ) {
        $this->request = $request;
        $this->orderRepository = $orderRepository;
    }
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

                if ( $order->orderStatus ) {
                    switch ($order->orderStatus->id) {
                        case 1:
                            return '<span class="label label-success">' . $order->orderStatus->name . '</span>';
                        case 2:
                            return '<span class="label label-info">' . $order->orderStatus->name . '</span>';
                        case 3:
                            return '<span class="label label-primary">' . $order->orderStatus->name . '</span>';
                        case 4:
                            return '<span class="label label-danger">' . $order->orderStatus->name . '</span>';
                        default:
                            return '<span class="label label-default">' . 'Không rõ' . '</span>';}

                }
                return '';
            })
            ->editColumn('payment_method', function (Order $order) {
                if ($order->paymentMethod) {
                    return $order->paymentMethod->name;
                }
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
        $order = Order::with(['province' => function ($query) {
            $query->select('id', 'name');
        }])
            ->with(['district' => function ($query) {
                $query->select('id', 'name');
            }])
            ->with(['ward' => function ($query) {
                $query->select('id', 'name');
            }])
            ->with(['orderStatus' => function ($query) {
                $query->select('id', 'name');
            }])
            ->where('id', $id)
            ->firstOrFail();
        $datas = $this->orderRepository->getDetailOrder($id);
        $user = $this->guard()->user();
        return view('admin.pages.order.detail', compact('order', 'user', 'datas'));
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
        $order = Order::where('id', $id)->first();
        $name = $request->name;
        switch ($name) {
            case 'last_name':
                $this->updateFullname($request, $order);
                break;
            default:
                # code...
                break;
        }
        return response()->json([
            'status' => true,
            'msg'    => 'Thành công'
        ]);
    }

    private function updateFullname($request, $order)
    {
        DB::transaction(function () use ($request , $order) {
            $name = $request->name;
            $order->$name = $request->value;
            $order->save();
        });
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