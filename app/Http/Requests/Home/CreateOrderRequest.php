<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use App\Order;

class CreateOrderRequest extends FormRequest
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
            'user_name'          => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'phone'         => 'required|regex:/^0[0-9]{9,10}$/|string|max:20',
            'amount'        => 'required|integer',
            'cart'          => 'required|json'
        ];
    }
}
