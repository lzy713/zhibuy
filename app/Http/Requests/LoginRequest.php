<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'sometimes|required|regex:/^\w{5,12}$/',
            'pwd' => 'sometimes|required|regex:/^\S{6,16}$/',
            'code' => 'sometimes|required',
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
            'name.required'=>"请输入用户名和密码",
            'name.regex'=>"用户名或密码错误",
            'pwd.required'=>"请输入用户名和密码",
            'pwd.regex'=>"用户名或密码错误",
            'code.required'=>"请输入验证码",
        ];
    }


}
