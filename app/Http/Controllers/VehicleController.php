<?php

namespace App\Http\Controllers;

use App\Contracts\IVehicleRepository;
use App\DTO\VehicleDTO;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Organization;
use App\Models\Vehicle;
use App\Repository\VehicleRepository;
use App\Services\CreateVehiclesService;
use App\Services\UpdateVehiclesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private IVehicleRepository $repository;
    public function __construct(UpdateVehiclesService $updateVehiclesService)
    {   $this->updateVehiclesService=$updateVehiclesService;
        $this->repository= new VehicleRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $organizations=Organization::with('vehicles')->get();
        return response()->json([
            'data'=>$organizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request, CreateVehiclesService $services):VehicleResource
    {
        $validated=$request->validated();
        $vehicle=$services->execute(VehicleDTO:: fromArray($validated));
        return new VehicleResource($vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):VehicleResource
    {$vehicle=$this->repository->getVehicleById($id);
        return new VehicleResource($vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, int $vehicleId):VehicleResource
    {
        $validated=$request->validated();
        $vehicle=$this->updateVehiclesService->updateVehiclesService($vehicleId,VehicleDTO::fromArray($validated)) ;
        return new VehicleResource($vehicle);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $vehicle=Vehicle::query()->find($id);
        if($vehicle===null){
            return response()->json(['message'=>'запись не найдена.']);
        }
        $vehicle->delete();
        return response()->json(['message'=>'запись была успешно удалена.']);
    }
}
