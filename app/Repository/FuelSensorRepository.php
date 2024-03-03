<?php

namespace App\Repository;

use App\Contracts\IFuelSensorRepository;
use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\FuelSensorDTO;
use App\DTO\UserDTO;
use App\DTO\VehicleDTO;
use App\Models\FuelSensor;
use App\Models\Organization;
use App\Models\User;
use App\Models\Vehicle;

class FuelSensorRepository implements IFuelSensorRepository
{
    public function getFuelSensorById(int $fuelSensorId): ?FuelSensor
    {

        /** @var FuelSensor|null $fuelSensor */
        $fuelSensor = FuelSensor::query()->find($fuelSensorId);
        $fuelSensor->load('vehicle');
        return $fuelSensor;
    }

    public function createFuelSensor(FuelSensorDTO $fuelSensorDTO): FuelSensor
    {
        $vehicle = Vehicle::where('name', $fuelSensorDTO->getVehicleName())->first();
        if (!$vehicle) {
            $vehicle = new Vehicle(['name' => $fuelSensorDTO->getVehicleName()]);
            $vehicle->save();
        }
        $fuelSensor = new FuelSensor();
        $fuelSensor->name = $fuelSensorDTO->getName();
        $fuelSensor->vehicle()->associate($vehicle);
        $fuelSensor->save();
        return $fuelSensor;
    }

    public function getExistVehicleById(string $id): ?FuelSensor
    {
        /** @var FuelSensor|null $fuelSensor */
        $fuelSensor = FuelSensor::query()->where('id', $id)->first();
        return $fuelSensor;
    }

    public function updateFuelSensor(int $fuelSensorId, FuelSensorDTO $fuelSensorDTO): FuelSensor
    {$fuelSensor = $this->getFuelSensorById($fuelSensorId);
        $vehicle = Vehicle::where('id', $fuelSensorDTO->getVehicleId())->first();
        if (!$vehicle) {
            $vehicle = new Vehicle(['name' => $fuelSensorDTO->getVehicleId()]);
            $vehicle->save();
        }
        $fuelSensor->name = $fuelSensorDTO->getName();
        $fuelSensor->vehicle()->associate($vehicle);
        $fuelSensor->save();
        return $fuelSensor;
    }
}
