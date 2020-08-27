<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helper\Pagination\PaginationHelper;
use App\Helper\Sort\SortHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductQuestion;
use Auth;


class ProductQuestionController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     * @param Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        
        $productQuestions = ProductQuestion::all();
        if (empty($request->all())) {
            $paginator = new PaginationHelper($productQuestions, 10);
            $items = $paginator->getItem(1);
            return view('admin.pages.product_question.list', ['current_page' => 1, 'productQuestions' => $productQuestions, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $result = SortHelper::sort($productQuestions, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('admin.pages.product_question.product_question_table', ['current_page' => $current_page, 'productQuestions' => $items, 'paginator' => $paginator]);
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
    public function store(Request $request)
    {
        $allRequest  = $request->all();
        $user_name = $allRequest['user_name'];
        $product_id = $allRequest['product_id'];
        $question_content = $allRequest['question_content'];
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'user_name' => $user_name,
            'product_id' => $product_id,
            'question_content' => $question_content,
        );
        
        //Insert vào bảng
        $insertData = DB::table('questions')->insert($dataInsertToDatabase);
        return redirect()->back();

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
        $question = ProductQuestion::find($id);
        $sanpham_id = $question->product_id;
        $product = DB::table('products')->select('*')->where('id',$sanpham_id)->get();
        $reply = DB::table('question_answer')->select('*')->where('question_id',$question->id)->get();
        return view('admin.pages.product_question.detail', ['question' => $question,'product' => $product,'reply' => $reply]);

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
        ProductQuestion::find($request->id)->delete();
        return ['msg' => 'Item deleted'];

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        $allRequest  = $request->all();
        $question_id = $allRequest['question_id'];
        $answer = $allRequest['answer'];
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'question_id' => $question_id,
            'answer' => $answer,
        );
        DB::table('question_answer')->where('question_id', $question_id)->delete();
        $product = DB::table('question_answer')->insert($dataInsertToDatabase);
        return back()->with('success', 'Gửi trả lời thành công');
    }

    public function changeStatus(Request $request)
    {
        $question = ProductQuestion::find($request->question_id);

        $status = $request->status;
        if ($question) {

            if ($status == 'on') {
                $question->status = 1;
                $question->save();
                return ['msg' => 'Đã công khai câu hỏi này!'];
            } else {
                $question->status = 0;
                $question->save();
                return ['msg' => 'Đã ẩn câu hỏi này!'];
            }
        }
    }
    /**
     * @param int $product_id
     */
    public function getReviewsByProduct($product_id)
    {
        $danhgia = DB::table('product_reviews')->select('*')->get();
        return view('front-end/product/detail', compact('danhgia'));
    }
}
