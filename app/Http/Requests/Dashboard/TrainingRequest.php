<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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

                    'title_ar' => 'required|string',
                    'title_en' => 'required|string',
                    'desc_en' => 'required|string',
                    'desc_ar' => 'required|string',


                    'icon' => 'required|image|max:2048',
                ];
                break;

            case 'PUT':
                return [

                    'title_ar' => ['required', 'string'],
                    'title_en' => ['required', 'string'],
                    'desc_ar' => 'required|string',
                    'desc_en' => 'required|string',

                    'icon' => 'nullable|image|max:2048',
                ];
                break;
        }
    }
}
