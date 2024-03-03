<?php

namespace App\DTO;

class FuelSensorDTO
{public function __construct(
    private string $name,
    private string $vehicleId)
{

}

    public function getName(): string
    {
        return $this->name;
    }

    public function getVehicleId(): string
    {
        return $this->vehicleId;
    }



    public static function fromArray(array $data):FuelSensorDTO
    {return new FuelSensorDTO(
        name: $data['name'],
        vehicleId: $data['vehicleId']
    );}
}
