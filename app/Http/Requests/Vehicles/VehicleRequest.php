<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'model.required' => __('validation.required'),
            'model.max' => __('validation.max'),
            'model.string' => __('validation.string'),
            'brand.required' => __('validation.vehicles.messages.brand.required'),
            'brand.max' => __('validation.vehicles.messages.brand.max'),
            'brand.string' => __('validation.vehicles.messages.brand.string'),
            'year.required' => __('validation.vehicles.messages.year.required'),
            'year.max' => __('validation.vehicles.messages.year.max'),
            'year.min' => __('validation.vehicles.messages.year.min'),
            'year.digits' => __('validation.vehicles.messages.year.digits'),
            'year.integer' => __('validation.vehicles.messages.year.integer'),
            'year.date_format' => __('validation.vehicles.messages.year.date_format'),
            'year.before' => __('validation.vehicles.messages.year.before'),
            'plate.required' => __('validation.vehicles.messages.plate.required'),
            'plate.string' => __('validation.vehicles.messages.plate.string'),
            'plate.max' => __('validation.vehicles.messages.plate.max'),
            'plate.unique' => __('validation.vehicles.messages.plate.unique'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'model' => __('validation.vehicles.attributes.model'),
            'brand' => __('validation.vehicles.attributes.brand'),
            'year' => __('validation.vehicles.attributes.year'),
            'plate' => __('validation.vehicles.attributes.plate'),
        ];
    }
}
