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
use App\Models\Organization;
use App\Models\Vehicle;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;

class CreateFuelSensorsService
{

public function __construct(private IFuelSensorRepository $repository)
{

}
public function execute(FuelSensorDTO $fuelSensorDTO): FuelSensor
{
return $this->repository->createFuelSensor($fuelSensorDTO);
}




}
