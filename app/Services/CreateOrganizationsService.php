<?php

namespace App\Services;

use App\Contracts\IOrganizationRepository;
use App\DTO\OrganizationDTO;
use App\Models\Organization;

class CreateOrganizationsService
{
    public function __construct(private IOrganizationRepository $repository)
    {

    }
    public function execute(OrganizationDTO $organizationDTO): Organization
    {

        return $this->repository->createOrganization($organizationDTO);
    }


}
