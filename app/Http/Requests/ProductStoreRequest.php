<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'discount' => 'required|integer',
            'description' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */

    public function messages()
    {
        return [
            'product_name.required' => 'Name is required!',
            'image.required' => 'Image is required!',
            'price.required' => 'Price is required!',
            'discount.required' => 'discount is required!',
            'description.required' => 'description is required!',
            'discount.integer' => 'Discount is invalid'
        ];
    }

}
