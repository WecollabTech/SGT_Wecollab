<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController; // Importa el controlador correcto
use App\Http\Controllers\PermisoController; // Importa el controlador correcto


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas de API para roles
Route::apiResource('roles', RoleController::class);
Route::apiResource('permisos', PermisoController::class);