<?php

namespace App\Http\Requests\MerchandiseDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentRequest extends FormRequest
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
            'id' => 'integer|required',
            'rate' => 'required|numeric|min:1|max:5',
        ];
    }
}
