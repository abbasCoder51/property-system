<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
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
            'county' => 'required',
            'country' => 'required',
            'town' => 'required',
            'postcode' => 'required',
            'description' => 'required',
            'displayable_address' => 'required',
            'image_upload' => 'required',
            'number_of_bedrooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'price' => 'required|integer',
            'property_type' => 'required',
            'contract_type' => 'required'
        ];
    }
}
