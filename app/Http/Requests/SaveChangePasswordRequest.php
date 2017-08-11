<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveChangePasswordRequest extends FormRequest
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
            'old_password' => 'required|alpha_num',
            'new_password' => 'required|alpha_num',
            'confirm_password' => 'same:new_password'
        ];
    }
}
