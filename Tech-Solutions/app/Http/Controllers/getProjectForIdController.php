<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class getProjectForIdController extends Controller
{
    public function getById($id)
    {
        // Retorna un solo proyecto por ID
        $proyecto = Proyecto::getById($id);

        if ($proyecto === null) {
            abort(404, 'Proyecto no encontrado');
        }

        return view('showProject', ['proyecto' => (object) $proyecto]);
    }

    // Método para manejar la búsqueda
    public function search(Request $request)
    {
        $id = $request->input('search_id');
        $proyecto = Proyecto::getById($id);

        if ($proyecto === null) {
            return redirect()->route('projects.index')->with('error', 'Proyecto no encontrado');
        }

        return view('infoProject', ['proyecto' => (object) $proyecto]);
    }
    
}
