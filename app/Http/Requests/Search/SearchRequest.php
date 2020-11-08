<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search' => 'string|required|max:30',
            'location' => 'string|required|max:30',
            'sort' => [
                'required',
                'string',
                'in:DefaultSearch,OrderByHighestPrice,OrderByLowestPrice,OrderByRate'
            ],
        ];
    }
}
