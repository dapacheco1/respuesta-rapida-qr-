<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Login for route authentication
Route::post('login',[
    App\Http\Controllers\Api\V1\LoginController::class,
    'login'
]);

Route::apiResource('v1/rols',App\Http\Controllers\Api\V1\RolController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/genders',App\Http\Controllers\Api\V1\GenderController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/persons',App\Http\Controllers\Api\V1\PersonController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/usuarios',App\Http\Controllers\Api\V1\UserController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');


//Bussines CORE API
Route::apiResource('v1/diseases',App\Http\Controllers\Api\V1\DiseaseController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/medicines',App\Http\Controllers\Api\V1\MedicineController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');

Route::apiResource('v1/classifications',App\Http\Controllers\Api\V1\ClassificationController::class)
->only(['index','store','show','update','destroy']);
//->middleware('auth:sanctum');
