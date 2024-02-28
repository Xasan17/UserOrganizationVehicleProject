<?php

namespace App\DTO;

class OrganizationDTO
{
public function __construct(
    private string $name)
{

}

    public function getName(): string
    {
        return $this->name;
    }
    public static function fromArray(array $data):OrganizationDTO
    {return new OrganizationDTO(
        name: $data['name']
    );
}
}
