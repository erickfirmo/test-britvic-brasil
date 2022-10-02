<?php

namespace App\Repositories;

use App\Interfaces\VehicleRepositoryInterface;
use App\Models\Vehicle;
use App\Filters\Vehicle\ModelFilter;
use App\Filters\Vehicle\BrandFilter;
use App\Filters\Vehicle\PlateFilter;

class VehicleRepository implements VehicleRepositoryInterface 
{
    public function __construct()
    {
        $this->builder = new Vehicle;
    }

    public function getAllVehicles() 
    {
        return Vehicle::all();
    }

    public function getVehicleById($vehicleId) 
    {
        return Vehicle::findOrFail($vehicleId);
    }

    public function deleteVehicle($vehicleId) 
    {
        Vehicle::destroy($vehicleId);
    }

    public function createVehicle(array $vehicleDetails) 
    {
        return Vehicle::create($vehicleDetails);
    }

    public function updateVehicle($vehicleId, array $newDetails) 
    {
        return Vehicle::whereId($vehicleId)->update($newDetails);
    }

    public function getFulfilledVehicles()
    {
        return Vehicle::where('is_fulfilled', true);
    }

    public function filter(array $search = [])
    {
        if(isset($search['model']) || isset($search['brand']) || isset($search['plate'])) {

            $this->addFilter(ModelFilter::class, $search);
            $this->addFilter(BrandFilter::class, $search);
            $this->addFilter(PlateFilter::class, $search);
            #$this->addFilter(new IntervalDateFilter(), $search);
            #$this->addFilter(new ReservesFilter(), $search);

        }

        return $this->builder;
    }

    public function addFilter($filter, $search)
    {
        $this->builder = (new $filter)->filter($this->builder, $search);

        return $this;
    }
}