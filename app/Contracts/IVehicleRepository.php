<?php

namespace App\Contracts;

use App\DTO\OrganizationDTO;
use App\DTO\VehicleDTO;
use App\Models\Organization;
use App\Models\Vehicle;

interface IVehicleRepository
{
    public function getVehicleById(int $vehicleId):?Vehicle;
//   public function createOrganization(VehicleDTO $vehicleDTO):Vehicle;
//    public function updateOrganization(int $vehicleId,VehicleDTO $vehicleDTO):?Organization;
}
