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
        $rules =  [
            'email'  => "required|regex:/(.+)@(.+)\.(.+)/i",
            'password'  => "required"
        ];
        return $rules;
    }

    public function messages(){
        return [
            'email.required' => __('common.login.validate.email_required'),
            'email.regex' => __('common.login.validate.email_email'),
            'password.required' => __('common.login.validate.password_required'),
        ];
    }
}
