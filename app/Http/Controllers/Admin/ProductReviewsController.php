<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductReviewsRequest;
use App\Repositories\ProductRepositories\ProductRviewsRepository;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
{

    protected $productReviewsRepo;

    public function __construct(ProductRviewsRepository $productReviewsRepo)
    {
        $this->productReviewsRepo = $productReviewsRepo;
    }

    /**
     * Display a listing of the resource.
     * @param Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $productReviews = $this->productReviewsRepo->getAll();
        if (empty($request->all())) {
            $paginator = new PaginationHelper($productReviews, 10);
            $items = $paginator->getItem(1);
            return view('Admin.pages.product_reviews.list', ['current_page' => 1, 'productReviews' => $productReviews, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $result = SortHelper::sort($productReviews, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.product_reviews.product_reviews_table', ['current_page' => $current_page, 'productReviews' => $items, 'paginator' => $paginator]);
        }
        return abort(404);
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
    public function store(ProductReviewsRequest $request)
    {
        return $request->all();
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
        //
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