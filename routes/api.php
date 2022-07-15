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

Route::apiResource('v1/usuarios',App\Http\Controllers\Api\V1\UsuarioController::class)
->only(['index','store','show','update','destroy'])
->middleware('auth:sanctum');
