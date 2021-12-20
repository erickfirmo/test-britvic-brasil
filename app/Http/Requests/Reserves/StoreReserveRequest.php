<?php

namespace App\Http\Requests\Reserves;

use App\Http\Requests\Reserves\ReserveRequest;
use Illuminate\Validation\Rule;

class StoreReserveRequest extends ReserveRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->input('date'));
        return [
            'vehicle_id' => [
                'required',
                'max:255',
                'exists:vehicles,id',
                Rule::unique('reserves')->where(function ($query) {
                    return $query->where('vehicle_id', $this->input('vehicle_id'))
                                ->where('date', $this->input('date'));
                })
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
                'string',
                'max:1000',
                'nullable'
            ]
        ];
    }
}
