<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'new-password' => [
                        'string',
                        'required', 
                        'min:8',
                        'regex:/[a-z]/', 
                        'regex:/[0-9]/',
                        'max:20',   
                        ],

            'confirm-password' => [
                        'string',
                        'required', 
                        'min:8',
                        'regex:/[a-z]/', 
                        'regex:/[0-9]/',
                        'max:20', 
                        ],

            'current-password' => 'string|required',
        ];
    }
}
