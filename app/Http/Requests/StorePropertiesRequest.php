<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertiesRequest extends FormRequest
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
            'county'                    => 'required|string',
            'country'                   => 'required|string',
            'town'                      => 'required|string',
            'description'               => 'required|string',
            'address'                   => 'required|string',
            'image'                     => 'required|file',
            'latitude'                  => 'required|string',
            'longitude'                 => 'required|string',
            'num_bedrooms'              => 'required|integer',
            'num_bathrooms'             => 'required|integer',
            'price'                     => 'required|string',
            'type'                      => 'required|string',
            'property_type_title'       => 'required|string',
            'property_type_description' => 'required|string'
        ];
    }
}
