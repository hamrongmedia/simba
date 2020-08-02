<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Requests\Admin\PaymentMethodRequest;
class PaymentMethodController extends Controller
{
	const PER_PAGE = 10;
    /**
     * @var pathView
     */
    protected $pathView = 'admin.pages.payment_status.';

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
     * Get List PaymentMethod.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
    	$datas = PaymentMethod::paginate(self::PER_PAGE);
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
    public function store(PaymentMethodRequest $request)
    {
        $params = $request->only('name','description');
        PaymentMethod::create($params);
        return redirect()->route('admin.payment_status.index');
    }

    /**
     * Show Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = PaymentMethod::findOrFail($id);
        return view($this->pathView.'edit',compact('data')); 
    }

    /**
     * Update Record order Status.
     * @param Int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PaymentMethodRequest $request)
    {
        $data = PaymentMethod::findOrFail($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.payment_status.index');
    }

    public function destroy(Request $request)
    {
    	
    }
}