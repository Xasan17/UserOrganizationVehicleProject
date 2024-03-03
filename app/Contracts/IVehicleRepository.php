<?php

namespace App\Contracts;

use App\DTO\OrganizationDTO;
use App\DTO\VehicleDTO;
use App\Models\Organization;
use App\Models\Vehicle;

interface IVehicleRepository
{
    public function getVehicleById(int $vehicleId):?Vehicle;
  public function createVehicle(VehicleDTO $vehicleDTO):Vehicle;
    public function updateVehicle(int $vehicleId,VehicleDTO $vehicleDTO):?Vehicle;
    public function getExistOrganizationById(string $id):?Vehicle;
}
