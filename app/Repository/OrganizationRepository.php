<?php

namespace App\Repository;

use App\Contracts\IOrganizationRepository;
use App\DTO\OrganizationDTO;
use App\Models\Organization;

class OrganizationRepository implements IOrganizationRepository
{
    public function getOrganizationById(int $OrganizationId): ?Organization

{  /** @var Organization|null $organization */
    $organization=Organization::query()->find($OrganizationId);

    return $organization;
}
    public function createOrganization(OrganizationDTO $OrganizationDTO):Organization{
        $organization=new Organization();
        $organization->name=$OrganizationDTO->getName();
        $organization->save();
        return $organization;
    }
    public function updateOrganization(int $organizationId, OrganizationDTO $OrganizationDTO):Organization{
        $organization = $this->getOrganizationById($organizationId);
        $organization->name=$OrganizationDTO->getName();
        $organization->save();
        return $organization;
    }
}
