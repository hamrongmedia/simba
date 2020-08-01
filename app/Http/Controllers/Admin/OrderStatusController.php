<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderStatus;
use App\Http\Requests\Admin\OrderStatusRequest;
class OrderStatusController extends Controller
{
	const PER_PAGE = 10;
    /**
     * @var pathView
     */
    protected $pathView = 'admin.pages.order_status.';

    /**
     * @var request
     */
    protected $request;

    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

    /**
     * Get List OrderStatus.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
    	$datas = OrderStatus::paginate(self::PER_PAGE);
    	return view($this->pathView.'index',compact('datas')); 
    }

    /**
     * Create Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return view($this->pathView.'create'); 
    }

    /**
     * Store Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderStatusRequest $request)
    {
        $params = $request->only('name');
        OrderStatus::create($params);
        return redirect()->route('admin.order_status.index');
    }

    /**
     * Show Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = OrderStatus::findOrFail($id);
        return view($this->pathView.'edit',compact('data')); 
    }

    /**
     * Update Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderStatusRequest $request)
    {
        $data = OrderStatus::findOrFail($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.order_status.index');
    }

    public function destroy(Request $request)
    {
    	
    }
}
