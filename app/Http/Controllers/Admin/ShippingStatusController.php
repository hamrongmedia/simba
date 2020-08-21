<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingStatus;
use App\Http\Requests\Admin\ShippingStatusRequest;
class ShippingStatusController extends Controller
{
	const PER_PAGE = 10;
    /**
     * @var pathView
     */
    protected $pathView = 'admin.pages.shipping_status.';

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
     * Get List ShippingStatus.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
    	$datas = ShippingStatus::paginate(self::PER_PAGE);
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
    public function store(ShippingStatusRequest $request)
    {
        $params = $request->only('name');
        ShippingStatus::create($params);
        return redirect()->route('admin.shipping_status.index');
    }

    /**
     * Show Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = ShippingStatus::findOrFail($id);
        return view($this->pathView.'edit',compact('data')); 
    }

    /**
     * Update Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ShippingStatusRequest $request)
    {
        $data = ShippingStatus::findOrFail($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.shipping_status.index');
    }

    public function destroy(Request $request)
    {
    	
    }
}