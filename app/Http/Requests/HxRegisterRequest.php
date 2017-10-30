<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HxRegisterRequest extends FormRequest
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
            'name' => 'bail|required|max:10',
            'phone' => 'bail|required|unique:hx2s|size:11',
            'company' => 'bail|required|max:30'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '姓名不能为空',
            'name.max' => '姓名不能超过10个字符',
            'phone.required' => '手机号不能为空',
            'phone.unique' => '手机号已经被注册',
            'phone.size' => '手机号格式不对',
            'company.required' => '公司名不能为空',
            'company.max' => '公司名不能过长'
        ];
    }
}
