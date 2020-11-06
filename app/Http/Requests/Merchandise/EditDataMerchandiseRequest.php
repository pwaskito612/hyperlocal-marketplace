<?php

namespace App\Http\Requests\Merchandise;

use Illuminate\Foundation\Http\FormRequest;

class EditDataMerchandiseRequest extends FormRequest
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
            'title' => 'string|required',
            'weight' => 'integer|required',
            'stock' => 'integer|required',
            'price' => 'integer|required',
            'location' => 'string|required',
            'categories' => 'string|required',
            'description' => 'required|min:3|max:1000',
        ];
    }
}
