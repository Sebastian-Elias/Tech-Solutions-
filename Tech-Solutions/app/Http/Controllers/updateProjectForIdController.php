<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class UpdateProjectForIdController extends Controller
{
    public function edit($id)
    {
        $proyecto = Proyecto::getById($id);

        if (!$proyecto) {
            return redirect()->route('projects.index')->with('error', 'Proyecto no encontrado.');
        }

        return view('editProject', ['proyecto' => $proyecto]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'activo' => 'required|boolean',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $proyectos = Proyecto::getAll();

        foreach ($proyectos as &$proyecto) {
            if ($proyecto['id'] == $id) {
                $proyecto['nombre'] = $validatedData['nombre'];
                $proyecto['fecha_inicio'] = $validatedData['fecha_inicio'];
                $proyecto['activo'] = $validatedData['activo'];
                $proyecto['responsable'] = $validatedData['responsable'];
                $proyecto['monto'] = $validatedData['monto'];

                Proyecto::updateAll($proyectos);
                break;
            }
        }

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado con éxito.');
    }
}

