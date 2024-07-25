<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class DeleteProjectForIdController extends Controller
{
    // Muestra el formulario de eliminación
    public function show($id)
    {
        $proyecto = Proyecto::getById($id);

        if (!$proyecto) {
            return redirect()->route('projects.index')->with('error', 'Proyecto no encontrado.');
        }

        return view('deleteProject', ['proyecto' => $proyecto]);
    }

    // Maneja la eliminación del proyecto
    public function delete(Request $request, $id)
    {
        $deleted = Proyecto::deleteById($id);

        if ($deleted) {
            return redirect()->route('projects.index')->with('success', 'Proyecto eliminado con éxito.');
        }

        return redirect()->route('projects.index')->with('error', 'Proyecto no encontrado.');
    }
}
