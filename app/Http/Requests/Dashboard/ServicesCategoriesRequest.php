<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ServicesCategoriesRequest extends FormRequest
{

    public function messages()
    {
     return[
         'name_ar.required'        => 'الاسم بالعربي مطلوب',
         'name_en.required'        => 'الاسم بالانجليزي مطلوب',
        'name_ar.unique'        => 'الاسم بالعربي موجود مسبقا',
        'name_en.unique'        => 'الاسم بالانجليزي موجود مسبقا',
        'name_ar.regex' => 'يجيب ان يكون الاسم بالعربي فقط',
        'name_en.regex' => 'يجيب ان يكون الاسم بالانجليزي فقط',
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

                    'name_ar'  => 'required|string|max:252|unique:service_categories,name_ar',
                    'name_en'  => 'required|string|max:255|unique:service_categories,name_en',

                ];
                break;

            case 'PUT':
                return [

                    'name_ar'  => ' required|string|regex:/^[\p{Arabic}\s]*$/u|unique:service_categories,name_ar,'.$this->id.',id',
                    'name_en'  => ' required|string|regex:/^[\p{Latin}\s]*$/u|unique:service_categories,name_en,'.$this->id.',id',

                ];
                break;
        }
    }
}
