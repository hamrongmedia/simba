<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Pagination\PaginationHelper;
use App\Helper\Search\SearchHelper;
use App\Helper\Sort\SortHelper;
use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (empty($request->all())) {
            $contacts = Contact::all()->sortBy('desc');
            $paginator = new PaginationHelper($contacts, 10);
            $items = $paginator->getItem(1);
            return view('admin.pages.contact.list_contact', ['current_page' => 1, 'contacts' => $items, 'paginator' => $paginator]);
        }

        if ($request->sort_by) {
            $contacts = Contact::all();
            $result = SortHelper::sort($contacts, $request->sort_by, $request->sort_type);
            $paginator = new PaginationHelper($result, 10);
            $current_page = $request->current_page ?? 1;
            $items = $paginator->getItem($current_page);
            return view('Admin.pages.ajax_components.contact_table', ['current_page' => $current_page, 'contacts' => $items, 'paginator' => $paginator]);
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
        $contact = Contact::find($id);
        return view('admin.pages.contact.contact_detail', ['contact' => $contact]);
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

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return ['msg' => 'Item deleted'];

    }
    public function reply($id, Request $request)
    {
        $content = $request->content;
        $contact = Contact::find($id);
        Mail::to($contact->email)->send(new ContactReplyMail($content));
        return redirect()->back()->with('success', 'Gủi mail thành công');
    }

    public function search(Request $request)
    {
        $data = $request->keyword;
        $result = SearchHelper::search(Contact::class, ['customer_name', 'email', 'phone'], $data);
        $paginator = new PaginationHelper($result, 10);
        $current_page = $request->current_page ?? 1;
        $items = $paginator->getItem($current_page);

        return view('Admin.pages.ajax_components.contact_table', ['current_page' => $current_page, 'contacts' => $items, 'paginator' => $paginator]);
    }
}