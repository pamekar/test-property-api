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
            'county' => 'required|string',
            'country' => 'required|string',
            'town' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'image_full' => 'required|string',
            'image_thumbnail' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'num_bedrooms' => 'required|string',
            'num_bathrooms' => 'required|string',
            'price' => 'required|string',
            'type' => 'required|string'
        ];
    }
}
