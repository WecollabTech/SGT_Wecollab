<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Tutorial;
use App\Http\Controllers\TutorialController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});




// Ruta para renderizar la vista de roles
Route::get('/roles', function () {
    return Inertia::render('Roles/Index');
})->name('roles');


// Ruta para renderizar la vista de roles
Route::get('/permisos', function () {
    return Inertia::render('Permisos/Index');
})->name('permisos');