<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewsRequest extends FormRequest
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
        return [
            'customer_email' => 'email:rfc|max:30|required',
            'customer_name' => 'required|max:30',
            'comment' => 'required|max:256',
        ];
    }

    public function messages()
    {
        return [
            'customer_email.max' => 'Email tối đa 30 ký tự',
            'customer_email.rfc' => 'Email không đúng định dạng',
            'customer_email.required' => 'Email không được để trống',
            'customer_name.required' => 'Vui lòng nhập tên khách hàng',
            'comment.required' => 'Vui lòng nhập nội dung comment',
        ];
    }

}