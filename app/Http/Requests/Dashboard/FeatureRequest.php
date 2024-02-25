<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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

                    'title_ar' => 'required|string|min:3|unique:features,title_ar',
                    'title_en' => 'required|string|min:3|unique:features,title_en',
                    'desc_ar' => 'required|string',
                    'desc_en' => 'required|string',
                    'icon' => 'required|image|max:2048',
                ];
                break;

            case 'PUT':
                $id = $this->route('feature');
                return [

                    'title_ar' => ['required', 'string', Rule::unique('features', 'title_ar')->ignore($id)],
                    'title_en' => ['required', 'string', Rule::unique('features', 'title_en')->ignore($id)],
                    'desc_ar' => 'required|string',
                    'desc_en' => 'required|string',
                     'icon' => 'nullable|image|max:2048',
                ];
                break;
        }
    }
    public function messages(): array
    {
        return [
            'title_ar.regex' => 'يجيب ان يكون الاسم بالعربي فقط',
            'title_en.regex' => 'يجيب ان يكون الاسم بالانجليزي فقط',
        ];
    }
}
