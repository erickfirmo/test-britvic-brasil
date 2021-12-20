<?php

namespace App\Http\Requests\Customers;

use App\Http\Requests\Customers\CustomerRequest;
use App\Rules\CpfRule;

class StoreCustomerRequest extends CustomerRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'document_number' => ['required', 'unique:customers', new CpfRule],
            'dob' => ['required', 'date']
        ];
    }
}
