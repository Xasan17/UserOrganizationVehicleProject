<?php

namespace App\DTO;

class VehicleDTO
{public function __construct(
    private string $name,
    private string $type,
    private string $company,
private string $organizationName)
{

}

    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public static function fromArray(array $data):VehicleDTO
    {return new VehicleDTO(
        name: $data['name'],
        type:$data['type'],
        company: $data['company'],
        organizationName: $data['organizationName']
    );}
}
