<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
        switch (request()->method()) {
            case 'POST':
                return [

                    'link' => 'nullable|url',
                    'image' => 'required|image|max:2048',
                ];
                break;

            case 'PUT':
                return [

                    'link' => 'nullable|url',
                    'image' => 'nullable|image|max:2048',

                ];
                break;
        }

    }
}
