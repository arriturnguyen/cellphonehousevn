<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class CreateUserRequest extends FormRequest
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
            'name'          => 'string|max:255',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|min:6',
            'address'       => 'string|max:255',
            'phone'         => 'regex:/^0[0-9]{9,10}$/|unique:users,phone',
            'user_type'     => 'required|integer|min:1|max:2',
            'active'        => 'required|boolean',
        ];
    }
}
