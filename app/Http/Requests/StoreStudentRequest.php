<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:students,email',
            'mobile'        => 'required|digits:10',
            'university_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'    => 'The first name field is required.',
            'last_name.required'     => 'The last name field is required.',
            'email.required'         => ' The email fiels is required.',
            'mobile.required'        => 'The mobile fiels is required.',
            'university_id.required' => 'The university id field is required.',
        ];
    }
}
