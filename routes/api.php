<?php

use App\Http\Controllers\FuelSensorController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\CheckClientHasApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::middleware(CheckClientHasApiToken::class)->group(function() {
    Route::get('users',[UserController::class , 'index']);
    Route::get('users/{id}',[UserController::class , 'show']);
    Route::delete('users/{id}',[UserController::class , 'destroy']);
    Route::post('users',[UserController::class , 'store']);
    Route::match(['put','patch'],'users/{id}', [UserController::class, 'update']);
    Route::get('organizations/{id}', [OrganizationController::class, 'show']);
    Route::delete('organizations/{id}', [OrganizationController::class, 'destroy']);
    Route::match(['put','patch'],'organizations/{id}', [OrganizationController::class, 'update']);
    Route::get('organization/{organization_id}/users', [UserController::class, 'getOrganizationUsers']);
    Route::get('organization/{organization_id}/users/{user_id}', [UserController::class, 'getOrganizationUserById']);
    Route::get('Organizations_Vehicles',[VehicleController::class , 'index']);
    Route::get('vehicle/{id}',[VehicleController::class , 'show']);
    Route::delete('vehicle/{id}',[VehicleController::class , 'destroy']);
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update']);
    Route::get('Vehicles_FuelSensors',[FuelSensorController::class , 'index']);
    Route::get('FuelSensor/{id}',[FuelSensorController::class , 'show']);
    Route::post('/FuelSensors', [FuelSensorController::class, 'store']);
    Route::put('/FuelSensors/{FuelSensor}', [FuelSensorController::class, 'update']);
    Route::post('organizations',[OrganizationController::class , 'store']);
    Route::match(['put','patch'],'organizations/{id}', [OrganizationController::class, 'update']);
});
