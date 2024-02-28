<?php

namespace App\Http\Controllers;

use App\Contracts\IVehicleRepository;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Organization;
use App\Models\Vehicle;
use App\Repository\VehicleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private IVehicleRepository $repository;
    public function __construct()
    {
        $this->repository= new VehicleRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $vehicles= Vehicle::all();
        return response()->json([
            'data'=>$vehicles
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
    public function store(StoreVehicleRequest $request, Organization $organization):JsonResponse
    {/**
     *
    */
        if (!$organization) {
            return response()->json(['message' => 'Организация не найдена'], 404);
        }

        $vehicle = $organization->vehicles()->create($request->validated());

        return response()->json($vehicle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):VehicleResource
    {$vehicle=$this->repository->getVehicleById($id);
        $vehicle = Vehicle::query()->find($id);
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
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle):JsonResponse
    {

        if (!$vehicle) {
            return response()->json(['message' => 'Транспортное средство не найдено'], 404);
        }
        $vehicle->update($request->validated());


        return response()->json($vehicle->refresh(), 200);
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
