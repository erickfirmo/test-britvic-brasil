<?php

namespace App\Interfaces;

interface VehicleRepositoryInterface 
{
    public function getAllVehicles();
    public function getVehicleById($vehicleId);
    public function deleteVehicle($vehicleId);
    public function createVehicle(array $vehicleDetails);
    public function updateVehicle($vehicleId, array $newDetails);
    public function getFulfilledVehicles();
}
