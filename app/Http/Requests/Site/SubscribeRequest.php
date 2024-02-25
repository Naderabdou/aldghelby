<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:subscribes,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('البريد الالكتروني مطلوب'),
            'email.email' => __('البريد الالكتروني يجب ان يكون بالصيغة الصحيحة'),
            'email.unique' => __('هذا البريد مشترك بالفعل'),
        ];
    }
}
