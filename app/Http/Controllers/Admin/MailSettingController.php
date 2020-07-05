<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailConfig;
use Illuminate\Http\Request;

class MailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail_list = MailConfig::all()->sortBy('desc');
        return view('admin/pages/theme_config/smtp_email_index', ['mails' => $mail_list]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //dd($request->all());
        // // validate form
        // $validatedData = $request->validate([
        //     "mail_from_adress" => "required|email:rfc",
        //     "mail_from_name" => "required|min:3|max:50",
        //     "mail_mailer" => "required|max:50",
        //     "mail_smpt_host" => "adfads",
        //     "mail_encryption" => "ssl",
        //     "mail_port" => "123",
        //     "mail_username" => "admin123",
        //     "mail_password" => "admin123",
        // ], [
        //     'name.required' => 'Trường tên không được để trống',
        //     'name.unique' => 'Tên quyền đã tồn tại',
        //     'action_list.required' => 'Hành động không được để trống',
        // ]);
        //save data
        $data = $request->all();
        MailConfig::create($data);
        //redirect back
        return redirect()->back()->with('success', 'Đăng ký mail thành công');
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
        $mail_list = MailConfig::all();
        $mail = MailConfig::findOrFail($id);
        return view('admin/pages/theme_config/smtp_email_edit', ['mail_edit' => $mail, 'mails' => $mail_list]);
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
        $data = $request->all();
        $mail = MailConfig::findOrFail($id);
        $mail->update($data);
        return redirect()->route('admin.mailsetting.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mail = MailConfig::findOrFail($id);
        $mail->delete();
        return redirect()->route('admin.mailsetting.index');

    }
}