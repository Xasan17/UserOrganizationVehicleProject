<?php

namespace App\Services;

use App\Contracts\IOrganizationRepository;
use App\DTO\OrganizationDTO;
use App\Models\Organization;

class UpdateOrganizationsService
{
    public function __construct(private IOrganizationRepository $repository)
    {

    }

    public function updateOrganizationService(int $organizationId, OrganizationDTO $OrganizationDTO): Organization
    {
        return $this->repository->updateOrganization($organizationId,$OrganizationDTO);}
}
