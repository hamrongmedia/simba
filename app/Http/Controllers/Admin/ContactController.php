<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty($request->all())) {
            $users = Admin::all()->sortBy('desc');
            $paginator = new PaginationHelper($users, 10);
            $items = $paginator->getItem(1);
            return view('admin.pages.contact.list_contact', ['current_page' => 1, 'users' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $users = Admin::all();
            $result = SortHelper::sort($users, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.ajax_components.user_table', ['current_page' => $current_page, 'users' => $items, 'paginator' => $paginator]);
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
        // validate form
        $validatedData = $request->validate([
            'customer_name' => ['required', 'max:255'],
            'email' => ['email' => 'email:rfc'],
            'phone' => ['max:30'],
            'title' => ['max:255'],
            'content' => ['max:1000', 'required'],
        ], [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'email.email' => 'Nhập sai định dạng email',
            'phone.max' => 'Số điện thoại tối đa 30 ký tự',
            'title.max' => 'Tiêu đề không quá 255 ký tự',
            'content.required' => 'Tin nhắn không được để trống',
            'content.max' => 'Tin nhắn không được quá 1000 ký tự',
        ]
        );
        $validatedData['status'] = false;
        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Cảm ơn quý khách đã gửi phản hồi');
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