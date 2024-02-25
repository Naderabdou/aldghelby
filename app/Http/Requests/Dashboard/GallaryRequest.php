<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GallaryRequest extends FormRequest
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

            'image.required' => 'من فضلك ادخل الصورة',
            'image.image' => 'من فضلك ادخل صورة من نوع jpg,png,jpeg',
            'project_id.required' => 'من فضلك اختر المشروع',

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

                    'image' => 'required',
                    'image.*' => 'image|mimes:jpeg,png,jpg',
                    'project_id' => 'required|exists:projects,id'
                ];
                break;

            case 'PUT':


                return [

                    'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                    'project_id' => 'required|exists:projects,id'
                ];
                break;
        }
    }

}
