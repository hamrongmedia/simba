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
        // validate form
        $validatedData = $request->validate([
            "mail_from_adress" => "required|email:rfc",
            "mail_from_name" => "required|min:3|max:50",
            "mail_mailer" => "required|max:50",
            "mail_smpt_host" => "required|max:50",
            "mail_encryption" => "required",
            "mail_port" => "required|max:50",
            "mail_username" => "required|max:50|email:rfc",
            "mail_password" => "required|max:50",
        ], [
            "mail_form_adress.required" => "Địa chỉ Email không được để trống",
            "mail_form_adress.email" => "Địa chỉ Email không đúng định dạng",
            "mail_smpt_host.required" => "SMTP host không được để trống",
            "mail_encryption.required" => "SMTP encryption không được để trống",
            "mail_port.required" => "SMTP port không được để trống",
            "mail_username.required" => "SMTP mail không được để trống",
            "mail_username.required" => "Phải là định dạng email",
            "mail_password.required" => "SMTP password không được để trống",
        ]);
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
        $validatedData = $request->validate([
            "mail_from_adress" => "required|email:rfc",
            "mail_from_name" => "required|min:3|max:50",
            "mail_mailer" => "required|max:50",
            "mail_smpt_host" => "required|max:50",
            "mail_encryption" => "required",
            "mail_port" => "required|max:50",
            "mail_username" => "required|max:50|email:rfc",
            "mail_password" => "required|max:50",
        ], [
            "mail_form_adress.required" => "Địa chỉ Email không được để trống",
            "mail_form_adress.email" => "Địa chỉ Email không đúng định dạng",
            "mail_smpt_host.required" => "SMTP host không được để trống",
            "mail_encryption.required" => "SMTP encryption không được để trống",
            "mail_port.required" => "SMTP port không được để trống",
            "mail_username.required" => "SMTP mail không được để trống",
            "mail_username.required" => "Phải là định dạng email",
            "mail_password.required" => "SMTP password không được để trống",
        ]);
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