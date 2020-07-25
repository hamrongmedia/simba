<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'fullname' => 'required|max:255',
            'phone' => 'required|regex:/^0\d{9}$/',
            'email' =>'required|email',
            'province' =>'required',
            'district_id' =>'required',
            'war_id' =>'required',
        ];
        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'fullname.max' => 'Vui lòng nhập nhỏ hơn 255 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex'=> 'Vui lòng nhập đúng định dạng số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
        ];

        return $messages;
    }
}
