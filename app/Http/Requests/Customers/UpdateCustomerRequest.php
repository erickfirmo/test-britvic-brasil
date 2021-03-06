<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CpfRule;
use App\Rules\AgeRule;

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
            'document_number' => ['required', 'unique:customers,document_number,' . $this->route('customer'), new CpfRule],
            'dob' => ['required', 'date', 'date_format:Y-m-d', 'before:today', new AgeRule(18)]
        ];
    }
}
