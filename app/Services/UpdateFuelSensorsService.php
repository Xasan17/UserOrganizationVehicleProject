<?php

namespace App\Services;

use App\Contracts\IFuelSensorRepository;
use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\FuelSensorDTO;
use App\DTO\UserDTO;
use App\DTO\VehicleDTO;
use App\Exceptions\BusinessExeption;
use App\Models\FuelSensor;
use App\Models\User;
use App\Models\Vehicle;

class UpdateFuelSensorsService
{

    public function __construct(private IFuelSensorRepository $repository)
{

}
    public function updateFuelSensorsService(int $fuelSensorsId, FuelSensorDTO $fuelSensorDTO): FuelSensor
    {
        return $this->repository->updateFuelSensor($fuelSensorsId, $fuelSensorDTO);
    }
}
