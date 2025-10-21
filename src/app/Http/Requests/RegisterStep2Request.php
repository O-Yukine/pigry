<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2Request extends FormRequest
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
            'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
            'target_weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => '現在の体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '体重は4桁以内、小数点1桁までで入力してください',
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
            'target_weight.regex' => '体重は4桁以内、小数点1桁までで入力してください',
        ];
    }
}
