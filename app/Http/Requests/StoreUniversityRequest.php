<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUniversityRequest extends FormRequest
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
            'name'    =>'required',
            'email'   =>'required',
            'logo'    =>'required',
            'website' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'The name field is required.',
            'email.required'   => ' The email fiels is required.',
            'logo.required'    => 'The logo fiels is required.',
            'website.required' => 'The website field is required.',
        ];
    }
}
