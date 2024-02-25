<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image.image' => 'يجب ان تكون الصورة من نوع jpg,png,jpeg',
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
                    'image'    => 'required|image',
                    'title_en'  => 'required|min:3|string',
                    'title_ar'  => 'required|min:3|string',
                ];
                break;

            case 'PUT':


                return [
                    'image'    => 'nullable|image',
                    'title_en'  => 'required|min:3|string',
                    'title_ar'  => 'required|min:3|string',
                ];
                break;
        }
    }
}
