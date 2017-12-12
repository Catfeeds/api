<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BgySignRequest extends FormRequest
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
            'phone' => 'bail|required|size:11',
            'name' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => '手机号不能为空',
            'phone.size' => '手机号格式不对',
            'name.required' => '姓名为必填项'
        ];
    }
}
