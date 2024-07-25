<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class NewProjectController extends Controller
{
    public function create()
    {
        // Muestra el formulario para crear un nuevo proyecto
        return view('createProject');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'activo' => 'required|boolean',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        // Crea un nuevo proyecto con los datos validados
        $nuevoProyecto = [
            'id' => time(), // Genera un ID único o usa una lógica específica para generar IDs
            'nombre' => $validatedData['nombre'],
            'fecha_inicio' => $validatedData['fecha_inicio'],
            'activo' => $validatedData['activo'],
            'responsable' => $validatedData['responsable'],
            'monto' => $validatedData['monto'],
        ];

        // Lee los proyectos existentes desde el archivo JSON
        $filePath = storage_path('app/proyectos.json');
        $proyectos = json_decode(file_get_contents($filePath), true);

        // Agrega el nuevo proyecto a la lista
        $proyectos[] = $nuevoProyecto;

        // Guarda los proyectos actualizados en el archivo JSON
        file_put_contents($filePath, json_encode($proyectos, JSON_PRETTY_PRINT));

        // Redirige a la lista de proyectos con un mensaje de éxito
        return redirect()->route('projects.index')->with('success', 'Proyecto creado con éxito.');
    }
}
