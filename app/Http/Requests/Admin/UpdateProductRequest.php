<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'          => 'required|string|max:255|unique:products,name,'.$this->product->id,
            'category_id'   => 'required|integer',
            'price'         => 'required|integer|min:0',
            'old_price'     => 'required|integer|min:0',
            'description'      => 'required|string',
            'image.*'        => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status'         => 'required|integer',
            'in_stock'         => 'required|integer'
        ];
    }
}
