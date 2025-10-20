<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalSettingRequest extends FormRequest
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

            'target_weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',

        ];
    }

    public function messages()
    {
        return [

            'target_weight.required' => '体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
            'target_weight.regex' => '体重は4桁以内、小数点1桁までで入力してください',

        ];
    }
}
