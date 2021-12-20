<?php

namespace App\Http\Requests\Vehicles;

use App\Http\Requests\Vehicles\VehicleRequest;
use Carbon\Carbon;

class StoreVehicleRequest extends VehicleRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model' => ['required', 'max:255', 'string'],
            'brand' => ['required', 'max:255', 'string'],
            'year' => [
                'required',
                'max:' . Carbon::now()->addYear()->format('Y'),
                'min:1900',
                'digits:4',
                'integer',
                'date_format:Y',
                'before:today'
            ],
            'plate' => [
                'required',
                'string',
                'max:7',
                'unique:vehicles'
            ]
        ];
    }
}
