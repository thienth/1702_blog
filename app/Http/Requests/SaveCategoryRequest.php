<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
{
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
        return [
            'cate_name' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Chuỵ Châm bảo bạn phải viết cái gì vào đây!'
        ];
    }
}
