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
            'email' => 'email:rfc|max:30|required',
            'fullname' => 'required|max:30',
            'contents' => 'required|max:256',
        ];
    }

    public function message()
    {
        return [
            'email.max' => 'Email tối đa 30 ký tự',
            'email.rfc' => 'Email không đúng định dạng',
            'email.required' => 'Email không được để trống',
            'fullname.required' => 'Vui lòng nhập tên khách hàng',
            'contents.required' => 'Vui lòng nhập nội dung comment',
        ];
    }

}