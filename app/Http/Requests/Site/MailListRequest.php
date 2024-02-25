<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class MailListRequest extends FormRequest
{
    public function messages()
    {
        return [
            'email.unique' => 'البريد الالكتروني موجود بالفعل',
        ];
    }

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
            'fullname' => 'required',
            'email' => 'required|email|unique:mail_lists,email',
        ];
    }
}
