<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Inertia\Inertia; // Aquí se importa Inertia

class TutorialController extends Controller
{
    public function index()
    {
        $tutoriales = Tutorial::all(); // Trae todos los tutoriales
        return Inertia::render('Tutorials/Index', [
            'tutoriales' => $tutoriales,
        ]);
    }

    public function create()
    {
        return Inertia::render('Tutorials/Create');
    }

    public function edit(Tutorial $tutorial)
    {
        return Inertia::render('Tutorials/Edit', [
            'tutorial' => $tutorial,
        ]);
    }
    public function nuevoDashboard()
    {
        // Retornar la vista 'NuevoDashboard' que se encuentra en resources/js/Pages
        return Inertia::render('NuevoDashboard');
    }
}