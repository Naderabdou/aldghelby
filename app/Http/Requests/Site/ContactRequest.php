<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => ['required', 'digits_between:10,14'],
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('الأسم الأول مطلوب'),
            'first_name.min' => __('الأسم الأول يجب الا يقل عن 3 حروف'),
            'last_name.required' => __('الأسم الثاني مطلوب'),
            'last_name.min' => __('الأسم الثاني يجب الا يقل عن 3 حروف'),
            'email.required' => __('البريد الالكتروني مطلوب'),
            'email.email' => __('البريد الالكتروني يجب ان يكون بالصيغة الصحيحة'),
            'phone.required' => __('رقم الهاتف مطلوب'),
            'message.required' => __('موضوع الرسالة مطلوب'),
        ];
    }
}
