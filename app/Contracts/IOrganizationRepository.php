<?php

namespace App\Contracts;

use App\DTO\OrganizationDTO;
use App\Models\Organization;

interface IOrganizationRepository
{
    public function getOrganizationById(int $OrganizationId):?Organization;
   public function createOrganization(OrganizationDTO $OrganizationDTO):Organization;
    public function updateOrganization(int $organizationId,OrganizationDTO $OrganizationDTO):?Organization;
}
