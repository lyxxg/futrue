<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class announcement extends FormRequest
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
          'user_id'=>'exists:user.id',
            'content'=>'required|max:9999|min:3',
        ];
    }

    public function messages()
    {
        return [
            'content.min'=>"公告内容最小为3个字符",
            'content.max'=>'公告内容最大为9999',
            'content.required'=>'公告内容不能为空',
            'user_id'=>'你别搞事情  我跟你讲 (手动 361度极限害怕)',
            ];
    }
}
