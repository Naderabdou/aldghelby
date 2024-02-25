<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValuesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [

            'services_ar' => 'الوصف بالعربي مطلوب',
            'services_en' => 'الوصف بالانجليزي مطلوب',
        ];
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

                    'title_ar' => 'required|string|min:3|unique:our_values,title_ar',
                    'title_en' => 'required|string|min:3|unique:our_values,title_en',
                    'services_ar'    => 'required',
                    'services_en'    => 'required',
                    'icon' => 'required|image|max:2048',
                ];
                break;

            case 'PUT':
                $id = $this->route('value');
                return [

                    'title_ar' => ['required', 'string', Rule::unique('our_values', 'title_ar')->ignore($id)],
                    'title_en' => ['required', 'string', Rule::unique('our_values', 'title_en')->ignore($id)],
                    'services_ar'    => 'required',
            'services_en'    => 'required',
                     'icon' => 'nullable|image|max:2048',
                ];
                break;
        }
    }
}
