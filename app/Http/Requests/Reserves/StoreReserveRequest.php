<?php

namespace App\Http\Requests\Reserves;

use App\Http\Requests\Reserves\ReserveRequest;

class StoreReserveRequest extends ReserveRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_id' => [
                'required',
                'max:255',
                'exists:vehicles,id'
            ],
            'customer_id' => [
                'required',
                'max:255',
                'exists:customers,id'
            ],
            'date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after:today'
            ],
            'description' => [
                'text',
                'max:1000'
            ]
        ];
    }
}
