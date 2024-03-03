<?php

namespace App\Http\Controllers;

use App\Contracts\IFuelSensorRepository;
use App\DTO\FuelSensorDTO;
use App\Http\Requests\StoreFuelSensorRequest;
use App\Http\Requests\UpdateFuelSensorRequest;
use App\Http\Resources\FuelSensorResource;
use App\Models\FuelSensor;
use App\Models\Vehicle;
use App\Repository\FuelSensorRepository;
use App\Services\CreateFuelSensorsService;
use App\Services\UpdateFuelSensorsService;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelSensorController extends Controller
{private IFuelSensorRepository $repository;
   public function __construct(
       UpdateFuelSensorsService $updateFuelSensorsService
   )
   {
       $this->updateFuelSensorsService=$updateFuelSensorsService;
       $this->repository= new FuelSensorRepository();
   }
    public function index():JsonResponse
    {
        $vehicles=Vehicle::with('fuelSensors')->get();
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
    public function store(StoreFuelSensorRequest $request, CreateFuelSensorsService $services):FuelSensorResource
    {
        $validated=$request->validated();
        $vehicle=$services->execute(FuelSensorDTO:: fromArray($validated));
        return new FuelSensorResource($vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):FuelSensorResource
    {
        $fuelSensor=$this->repository->getFuelSensorById($id);
        return new FuelSensorResource($fuelSensor);
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
    public function update(UpdateFuelSensorRequest $request, int $fuelSensorId):FuelSensorResource
    {
        $validated=$request->validated();
        $fuelSensor=$this->updateFuelSensorsService->updateFuelSensorsService($fuelSensorId,FuelSensorDTO::fromArray($validated)) ;
        return new FuelSensorResource($fuelSensor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
