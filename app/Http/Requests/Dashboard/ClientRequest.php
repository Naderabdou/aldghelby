<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{


    public function messages()
    {
        return [

            'image.image' => 'من فضلك ادخل صورة من نوع jpg,png,jpeg',

        ];
    }
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
    public function rules()
    {
        switch (request()->method()) {
            case 'POST':
                return [
                    'name_ar'  => 'required|string|min:3|max:252',
                    'name_en'  => 'required|string|min:3|max:255',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'    => 'required|image',

                ];
                break;

            case 'PUT':

                return [

                    'name_ar'  => ' required|string|min:3',
                    'name_en'  => ' required|string|min:3',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'  => 'sometimes|image',
                ];
                break;
        }
    }
}
