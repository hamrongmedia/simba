<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'product_code' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|max:'.(int)$this->price,
            'stock' => 'required_if:stock_unlimited,off|numeric',
            'stock_unlimited' => 'required_if:stock,null',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'product_code.required' => 'Vui lòng nhập mã sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm chỉ được nhập số',
            'sale_price.numeric' => 'Giá sản phẩm chỉ được nhập số',
            'sale_price.max' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'stock.required' => 'Vui lòng nhập số lượng',
            'stock.numeric' => 'Số lượng chỉ được nhập số',
        ];

        return $messages;
    }
}
