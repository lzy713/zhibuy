<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UppasswordRequest extends FormRequest
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
            'newpwd' => 'required|regex:/^\w{4,16}$/',
            'dsword' => 'same:newpwd',
        ];
    }


    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'newpwd.required'=>"密码不能为空",
            'newpwd.regex'=>"密码格式为4-16位字符",
            'dsword.same'=>"两次密码不一致",
        ];
    }


}
