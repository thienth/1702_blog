<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Slug;
use App\Models\Category;
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
            'cate_name' => [
                'required',
                'min:5',
                Rule::unique('categories')->ignore($this->get('id'))
            ], 
            'slug' => [
                'required', 
                Rule::unique("slugs")->ignore($this->get('id'), 'entity_id')->where(function ($query) {
                      $query->where('entity_type', ENTITY_TYPE_CATEGORY);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Chuỵ Châm bảo bạn phải viết cái gì vào đây!',
            'cate_name.unique' => 'Tên danh mục đã tồn tại!',
            'slug.' => "URL đã tồn tại!"
        ];
    }
}
