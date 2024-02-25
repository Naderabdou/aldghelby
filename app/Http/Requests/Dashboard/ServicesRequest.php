<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ServicesRequest extends FormRequest
{

    public function messages()
    {
        return [
            'name_ar.regex' => 'يجيب ان يكون الاسم بالعربي فقط',
            'name_en.regex' => 'يجيب ان يكون الاسم بالانجليزي فقط',
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'يجب ان تكون الصورة من نوع jpg,png,jpeg',

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

                    'name_ar'  => 'required|string|min:3|max:252|unique:services,name_ar',
                    'name_en'  => 'required|string|min:3|max:255|unique:services,name_en',
                    'desc_en'  => 'required|string|min:3',
                    'desc_ar'  => 'required|string|min:3',
                    'image'    => 'required|image',
                    "icon"     => "required|image",
                ];
                break;

            case 'PUT':
                $id = $this->route()->parameter('service');


                return [

                    'name_ar'  => ' required|string|min:3|unique:services,name_ar,' . $id . ',id',
                    'name_en'  => ' required|string|min:3|unique:services,name_en,' . $id . ',id',
                    'desc_en'  => 'required|string|min:3',
                    'desc_ar'  => 'required|string|min:3',
                    'image'    => 'nullable|image',
                    "icon"     => "nullable|image",
                ];
                break;
        }
    }


}
