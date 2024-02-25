<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{

    public function messages()
    {
       return [
        'image.required' => 'من فضلك ادخل الصورة',
        'image.image' => 'من فضلك ادخل صورة من نوع jpg,png,jpeg',

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
        switch (request()->method()) {
            case 'POST':
                return [

                    'name_ar'  => 'required|string|min:3|max:252',
                    'name_en'  => 'required|string|min:3|max:255',
                    'image'    => 'required|image|mimes:jpeg,png,jpg',

                    'desc_ar'    => 'required|min:3|string',
                    'desc_en'    => 'required|min:3|string',

                ];
                break;

            case 'PUT':
                return [

                    'name_ar'  => 'required|string|min:3|max:252',
                    'name_en'  => 'required|string|min:3|max:255',
                    'image'    => 'sometimes|image|mimes:jpeg,png,jpg',

                    'desc_ar'    => 'required|string|min:3|max:255',
                    'desc_en'    => 'required|string|min:3|max:255',
                ];
                break;
        }
    }
}
