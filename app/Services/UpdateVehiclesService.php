<?php

namespace App\Services;

use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\UserDTO;
use App\DTO\VehicleDTO;
use App\Exceptions\BusinessExeption;
use App\Models\User;
use App\Models\Vehicle;

class UpdateVehiclesService
{

    public function __construct(private IVehicleRepository $repository)
{

}
    public function updateVehiclesService(int $vehicleId, VehicleDTO $vehicleDTO): Vehicle
    {
        return $this->repository->updateVehicle($vehicleId, $vehicleDTO);
    }
}
