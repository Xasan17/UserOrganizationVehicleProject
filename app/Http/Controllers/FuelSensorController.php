<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFuelSensorRequest;
use App\Http\Requests\UpdateFuelSensorRequest;
use App\Http\Resources\FuelSensorResource;
use App\Models\FuelSensor;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $FuelSensor= FuelSensor::all();
        return response()->json([
            'data'=>$FuelSensor
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
    public function store(StoreFuelSensorRequest $request,Vehicle $vehicles):JsonResponse
    {
        if (!$vehicles) {
            return response()->json(['message' => 'Транспортное средство не найдено'], 404);
        }

        /** @var array $FuelSensors */
        $FuelSensor = $vehicles->fuelsensors()->create($request->validated());

        return response()->json($FuelSensor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):FuelSensorResource
    {
        $FuelSensor = FuelSensor::query()->find($id);
        return new FuelSensorResource($FuelSensor);
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
    public function update(UpdateFuelSensorRequest $request, FuelSensor $FuelSensor):JsonResponse
    {
        if (!$FuelSensor) {
            return response()->json(['message' => 'Fuel sensor not found'], 404);
        }
        $FuelSensor->update($request->validated());


        return response()->json($FuelSensor->refresh(), 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
