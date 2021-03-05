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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'county' => 'string',
            'country' => 'string',
            'town' => 'string',
            'description' => 'string',
            'address' => 'string',
            'image_full' => 'string',
            'image_thumbnail' => 'string',
            'latitude' => 'string',
            'longitude' => 'string',
            'num_bedrooms' => 'string',
            'num_bathrooms' => 'string',
            'price' => 'string',
            'type' => 'string'
        ];
    }
}
