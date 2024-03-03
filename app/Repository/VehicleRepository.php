<?php

namespace App\Repository;

use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\UserDTO;
use App\DTO\VehicleDTO;
use App\Models\Organization;
use App\Models\User;
use App\Models\Vehicle;

class VehicleRepository implements IVehicleRepository
{
    public function getVehicleById(int $vehicleId): ?Vehicle
    {

        /** @var Vehicle|null $vehicle */
        $vehicle = Vehicle::query()->find($vehicleId);
        $vehicle->load('organization');
        return $vehicle;
    }

    public function createVehicle(VehicleDTO $vehicleDTO): Vehicle
    {
        $organization = Organization::where('name', $vehicleDTO->getOrganizationName())->first();
        if (!$organization) {
            $organization = new Organization(['name' => $vehicleDTO->getOrganizationName()]);
            $organization->save();
        }
        $vehicle = new Vehicle();
        $vehicle->name = $vehicleDTO->getName();
        $vehicle->type = $vehicleDTO->getType();
        $vehicle->company = $vehicleDTO->getCompany();
//        $vehicle->organizationId=$vehicleDTO->getOrganizationId();
        $vehicle->organization()->associate($organization);
        $vehicle->save();
        return $vehicle;
    }

    public function getExistOrganizationById(string $id): ?Vehicle
    {
        /** @var Vehicle|null $vehicle */
        $vehicle = Vehicle::query()->where('id', $id)->first();
        return $vehicle;
    }

    public function updateVehicle(int $vehicleId, VehicleDTO $vehicleDTO): Vehicle
    {$vehicle = $this->getVehicleById($vehicleId);
        $organization = Organization::where('name', $vehicleDTO->getOrganizationName())->first();
        if (!$organization) {
            $organization = new Organization(['name' => $vehicleDTO->getOrganizationName()]);
            $organization->save();
        }
        $vehicle->name = $vehicleDTO->getName();
        $vehicle->type = $vehicleDTO->getType();
        $vehicle->company = $vehicleDTO->getCompany();
        $vehicle->organization()->associate($organization);
        $vehicle->save();
        return $vehicle;
    }
}
