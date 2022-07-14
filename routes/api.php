<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/rols',App\Http\Controllers\Api\V1\RolController::class)
->only(['index','show']);

Route::apiResource('v1/genders',App\Http\Controllers\Api\V1\GenderController::class)
->only(['index','show']);

Route::apiResource('v1/persons',App\Http\Controllers\Api\V1\PersonController::class)
->only(['index','show']);

Route::apiResource('v1/usuarios',App\Http\Controllers\Api\V1\UsuarioController::class)
->only(['index','show']);
