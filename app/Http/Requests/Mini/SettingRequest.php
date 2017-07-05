<?php

namespace App\Http\Requests\Mini;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'openid' => 'required',
            'gname' => 'required|between:2,10',
            'avatar' => 'present',
            'step_aim' => 'required|numeric',
            'introduction' => 'present'
        ];
    }

    public function messages()
    {
        return [
            'openid.required' => '非法请求',
            'gname.required' => '群名不能为空',
            'gname.between' => '群名长度在2到10之间',

            'step_aim.required' => '步数目标不能为空',
            'step_aim.numeric' => '请输入正确的步数目标'
        ];
    }
}
