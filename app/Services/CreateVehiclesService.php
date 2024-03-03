<?php

namespace App\Services;

use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\UserDTO;
use App\DTO\VehicleDTO;
use App\Exceptions\BusinessExeption;
use App\Models\Organization;
use App\Models\Vehicle;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;

class CreateVehiclesService
{

public function __construct(private IVehicleRepository $repository)
{

}
public function execute(VehicleDTO $vehicleDTO): Vehicle
{
return $this->repository->CreateVehicle($vehicleDTO);
}




}
