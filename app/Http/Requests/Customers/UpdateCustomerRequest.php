<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CpfRule;

class UpdateCustomerRequest extends FormRequest
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
            'document_number' => ['required', 'unique:customers' . 'unique:customers,' . $this->route('customer'), new CpfRule],
            'dob' => ['required', 'date', new AgeRule(18)]
        ];
    }
}
