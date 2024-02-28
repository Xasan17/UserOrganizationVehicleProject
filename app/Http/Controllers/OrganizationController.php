<?php

namespace App\Http\Controllers;

use App\Contracts\IOrganizationRepository;
use App\DTO\OrganizationDTO;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization ;
use App\Repository\OrganizationRepository;
use App\Repository\UserRepository;
use App\Services\CreateOrganizationsService;
use App\Services\UpdateOrganizationsService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected  $updateOrganizationsService;
    private IOrganizationRepository $repository;
    public function __construct(UpdateOrganizationsService $updateOrganizationsService)
    {   $this->updateOrganizationsService=$updateOrganizationsService;
        $this->repository=new OrganizationRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations= Organization::all();
        return response()->json([
            'data'=>$organizations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request, CreateOrganizationsService $services):OrganizationResource
    {
        $validated=$request->validated();
        $organization=$services->execute(OrganizationDTO:: fromArray($validated));
        return new OrganizationResource($organization);
    }

    /**
     * Display the specified resource.
     */
        public function show(int $id):OrganizationResource
    {
        $organization=$this->repository->getOrganizationById($id);
        if ($organization===null){
            return response()->json(['message'=>'Organization not found'],400);
        }

        return new OrganizationResource($organization);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request,int $organizationId,UpdateOrganizationsService $updateOrganizationsService)
    {  $this->updateOrganizationsService=$updateOrganizationsService;
        $validated=$request->validated();
        $organization=$this->updateOrganizationsService->updateOrganization($organizationId,OrganizationDTO::fromArray($validated)) ;
        return new OrganizationResource($organization);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { $organization=$this->repository->getOrganizationById($id);
        if($organization===null){
            return response()->json(['message'=>'запись не найдена.']);
        }
        $organization->delete();
        return response()->json(['message'=>'запись была успешно удалена.']);
    }
    }

