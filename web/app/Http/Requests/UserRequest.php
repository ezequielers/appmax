<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
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
            'use_name' => 'required|max:255',
            'use_email' => 'required|max:255'
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
            'use_name.required' => 'A name is required',
            'use_name.max'  => 'Maximum of :max characters',
            'use_email.required' => 'A name is required',
            'use_email.max'  => 'Maximum of :max characters'
        ];
    }
}
