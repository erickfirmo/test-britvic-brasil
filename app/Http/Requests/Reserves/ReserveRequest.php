<?php

namespace App\Http\Requests\Reserves;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'vehicle_id.required' => __('validation.reserves.messages.vehicle_id.required'),
            'vehicle_id.max' => __('validation.reserves.messages.vehicle_id.max'),
            'vehicle_id.exists' => __('validation.reserves.messages.vehicle_id.exists'),
            'customer_id.required' => __('validation.reserves.messages.customer_id.required'),
            'customer_id.max' => __('validation.reserves.messages.customer_id.max'),
            'customer_id.exists' => __('validation.reserves.messages.customer_id.exists'),
            'date.required' => __('validation.reserves.messages.date.required'),
            'date.date' => __('validation.reserves.messages.date.date'),
            'date.date_format' => __('validation.reserves.messages.date.date_format'),
            'date.after' => __('validation.reserves.messages.date.after'),
            'description.text' => __('validation.reserves.messages.description.text'),
            'description.max' => __('validation.reserves.messages.description.max'),
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
            'vehicle_id' => __('validation.reserves.attributes.vehicle_id'),
            'customer_id' => __('validation.reserves.attributes.customer_id'),
            'date' => __('validation.reserves.attributes.date'),
            'description' => __('validation.reserves.attributes.description'),
        ];
    }
}
