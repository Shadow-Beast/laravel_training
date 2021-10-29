<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateBeerRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'brewery_id' => ['required', 'numeric'],
            'abv' => ['required', 'numeric'],
            'ibu' => ['numeric', 'nullable'],
            'style' => ['required', 'max:255'],
            'ounces' => ['required', 'numeric'],
        ];
    }
}
