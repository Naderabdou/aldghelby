<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ServiceOrdersRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^[a-zA-Z\s]*$/',
            'phone' => ['required', 'digits_between:10,14'],
            'email' => 'required|email',
            'service_id' => 'required|integer|exists:services,id',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'phone.min' => 'رقم الهاتف يجب ان يكون 10 ارقام على الاقل',
        ];
    }
}
