<?php

namespace App\Http\Requests;

class ProductRequest extends BaseRequest
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
            'pro_sku' => 'required|max:255',
            'pro_name' => 'required|max:255',
            'pro_price' => 'required|max:255',
            'pro_amount' => 'required|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pro_sku.required' => 'SKU is required',
            'pro_sku.max'  => 'Maximum of :max characters',
            'pro_name.required' => 'Name is required',
            'pro_name.max'  => 'Maximum of :max characters',
            'pro_price.required' => 'Price is required',
            'pro_price.max'  => 'Maximum of :max characters',
            'pro_amount.required' => 'Amount is required',
            'pro_amount.max'  => 'Maximum of :max characters'
        ];
    }
}
