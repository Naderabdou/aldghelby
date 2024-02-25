<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
                    'title_ar'  => 'required|string|min:3|max:252|unique:blogs,title_ar',
                    'title_en'  => 'required|string|min:3|max:255|unique:blogs,title_en',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'    => 'required|image',

                ];
                break;

            case 'PUT':
                $id = $this->route('blog');

                return [

                    'title_ar'  => ' required|string|min:3|unique:blogs,title_ar,'.$id.',id',
                    'title_en'  => ' required|string|min:3|unique:blogs,title_en,'.$id.',id',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'  => 'sometimes|image',
                ];
                break;
        }
    }
}
