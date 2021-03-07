<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertiesRequest extends FormRequest
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
            'county'                    => 'string',
            'country'                   => 'string',
            'town'                      => 'string',
            'description'               => 'string',
            'address'                   => 'string',
            'image'                     => 'file',
            'latitude'                  => 'string',
            'longitude'                 => 'string',
            'num_bedrooms'              => 'integer',
            'num_bathrooms'             => 'integer',
            'price'                     => 'string',
            'type'                      => 'string',
            'property_type_title'       => 'string',
            'property_type_description' => 'string'
        ];
    }
}
