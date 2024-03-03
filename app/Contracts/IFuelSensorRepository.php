<?php

namespace App\Contracts;

use App\DTO\FuelSensorDTO;
use App\DTO\OrganizationDTO;
use App\DTO\VehicleDTO;
use App\Models\FuelSensor;
use App\Models\Organization;
use App\Models\Vehicle;

interface IFuelSensorRepository
{
    public function getFuelSensorById(int $fuelSensorId): ?FuelSensor;

    public function createFuelSensor(FuelSensorDTO $fuelSensorDTO): FuelSensor;

    public function updateFuelSensor(int $fuelSensorId, FuelSensorDTO $fuelSensorDTO): ?FuelSensor;

    public function getExistVehicleById(string $id): ?FuelSensor;
}
