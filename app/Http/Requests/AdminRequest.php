<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        //$id = $this->route('admin'); //获取当前需要排除的id
        return [
            //'name' => 'required|unique:fd_admin,name,".$id|regex:/^\w{6,12}$/',
            //'name' => 'required|unique:fd_admin|regex:/^\w{6,12}$/',
            'name' => 'sometimes|required|regex:/^\w{5,12}$/',
            'pwd' => 'sometimes|required|regex:/^\S{6,16}$/',
            'repwd' => 'sometimes|same:pwd',
            'rid' => 'sometimes|required',
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
            'name.required'=>"用户名不能为空",
            //'name.unique'=>"用户名不可用",
            'name.regex'=>"用户名格式为5-12位 数字、字母、下划线",
            'pwd.required'=>"密码不能为空",
            'pwd.regex'=>"密码格式为6-16位字符",
            'repwd.same'=>"两次密码不一致",
            'rid.required'=>"请选择角色",
        ];
    }

}
