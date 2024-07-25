<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class GetProjectController extends Controller
{
    public function index()
    {
        // Obtén todos los proyectos
        $proyectos = Proyecto::getAll();


        // Pasa los proyectos a la vista
        return view('showProject', ['proyectos' => $proyectos, 'showList' => true]);
    }
    
    public function show($id)
    {
        // Obtén el proyecto específico por ID
        $proyecto = Proyecto::getById($id);


        if ($proyecto === null) {
            abort(404, 'Proyecto no encontrado');
        }

        return view('showProject', ['proyecto' => (object) $proyecto]); // Usar showProject.blade.php
    }
}
