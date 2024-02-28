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

    public function updateUserService(int $userId, OrganizationDTO $OrganizationDTO): Organization
    {
        return $this->repository->updateOrganization($userId);}
}
