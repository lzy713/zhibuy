<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminOrderRequest extends FormRequest
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
            'consignee' => 'required|max:5',
            'address'   => 'required',
            'phone'     => 'required|regex:/^1[3456789]\d{9}$/',
        ];
    }


    public function messages()
    {
        return [
            'consignee.required' => '收货人不能为空', 
            'consignee.max'      => '收货人长度0-5个字符', 
            'address.required'   => '收货地址不能为空',
            'phone.required'     => '手机号不能为空',
            'phone.regex'         => '手机号格式不正确',
        ];
    }
}
