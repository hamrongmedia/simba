<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductReviewsRequest;
use App\Models\ProductReview;
use App\Models\ProductReviewAnswer;
use App\Repositories\ProductRepositories\ProductRviewsRepository;
use Auth;
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
        try {
            $product_reviews = ProductReview::create($request->all());
        } catch (Exception $err) {
            return ['err' => $err];
        }
        return ['msg' => 'Lưu thành công'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = ProductReview::find($id);

        return view('admin.pages.product_reviews.detail', ['review' => $review]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        ProductReview::find($request->id)->delete();
        return ['msg' => 'Item deleted'];

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'Câu trả lời không được để trống',
        ]);

        $admin = Auth::user();

        $data = [
            'author_id' => $admin->id,
            'product_review_id' => $request->product_review_id,
            'answer' => $request->content,
        ];
        //delete old ans
        ProductReviewAnswer::where('product_review_id', '=', $request->product_review_id)->delete();
        // create new one
        ProductReviewAnswer::create($data);

        return back()->with('success', 'Gửi trả lời thành công');
    }

    public function changeStatus(Request $request)
    {
        $review = ProductReview::find($request->review_id);

        $status = $request->status;
        if ($review) {

            if ($status == 'on') {
                $review->status = 1;
                $review->save();
                return ['msg' => 'Đã công khai review này!'];
            } else {
                $review->status = 0;
                $review->save();
                return ['msg' => 'Đã ẩn review này!'];
            }
        }
    }
}