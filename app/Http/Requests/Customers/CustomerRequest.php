<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max'),
            'document_number.required' => __('validation.required'),
            'document_number.unique' => __('validation.customers.messages.document_number.unique'),
            'dob.required' => __('validation.required'),
            'dob.date' => __('validation.date'),
            'dob.date_format' => __('validation.date_format'),
            'dob.before' => __('validation.customers.messages.dob.before.today'),
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
            'name' => __('validation.attributes.customers.name'),
            'document_number' => __('validation.attributes.customers.document_number'),
            'dob' => __('validation.attributes.customers.dob')
        ];
    }
}
