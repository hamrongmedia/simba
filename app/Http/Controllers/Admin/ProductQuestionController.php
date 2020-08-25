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

    public function delete(Request $request)
    {
        ProductQuestion::find($request->id)->delete();
        return redirect('hrm/product-question');

    }
    public function store(Request $request)
    {
        //Lấy giá trị đã nhập
        $allRequest  = $request->all();
        $user_name = $allRequest['user_name'];
        $question_content = $allRequest['question_content'];
        $product_id = $allRequest['$product->id'];
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'user_name' => $user_name,
            'question_content' => $question_content,
            'product_id' => $product_id,
        );
        
        //Insert vào bảng
        $insertData = DB::table('questions')->insert($dataInsertToDatabase);
        return redirect()->back();
    }
}
