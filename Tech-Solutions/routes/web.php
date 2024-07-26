<?php

use App\Http\Controllers\MantenedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeleteProjectForIdController;
use App\Http\Controllers\GetProjectController;
use App\Http\Controllers\GetProjectForIdController;
use App\Http\Controllers\NewProjectController;
use App\Http\Controllers\UpdateProjectForIdController;
use Illuminate\Http\Request;
use App\Models\Proyecto;


// Vista principal
Route::get('/', function () {
    return view('welcome');
});

Route::get('/mantenedor', function () {
    // $data = [
    //     'data' => [
    //         'atributo' => 'valor'
    //     ]
    // ];

    // $dat2 = array(
    //     'data' = array(
    //         "atributo" => "asd"
    //     )
    // );
    // return $data;
    return view('MantenedorView');
});

// Route::get('/mantenedor', function () {
//     $control = new MantenedorController();
//     $retorno = $control->get(NULL);
//     return $retorno;
// });

Route::get('/mantenedor/{_id}', function ($_id) {
    $control = new MantenedorController();
    $retorno = $control->get($_id);
    return $retorno;
});

Route::post('/mantenedor', function () {
});

Route::put('/mantenedor/{id}', function ($id) {

});

Route::delete('/mantenedor/{id}', function ($id) {

});

// Rutas para manejar proyectos

// Obtener todos los proyectos
Route::get('/proyectos', [GetProjectController::class, 'index'])->name('projects.index');

// Ruta para mostrar el formulario de creación de proyecto
Route::get('/proyectos/crear', [NewProjectController::class, 'create'])->name('projects.create');

// Ruta para almacenar el nuevo proyecto
Route::post('/proyectos', [NewProjectController::class, 'store'])->name('projects.store');

// Ruta para mostrar el formulario de edición
Route::get('/proyectos/{id}/edit', [UpdateProjectForIdController::class, 'edit'])->name('projects.edit');

// Ruta para actualizar el proyecto
Route::put('/proyectos/{id}', [UpdateProjectForIdController::class, 'update'])->name('projects.update');

// Ruta para mostrar los detalles de un proyecto
Route::get('/proyectos/{id}', [GetProjectForIdController::class, 'getById'])->name('projects.show');

// Ruta para mostrar el formulario de eliminación del proyecto
Route::get('/proyectos/{id}/delete', [DeleteProjectForIdController::class, 'show'])->name('projects.delete.show');

// Ruta para manejar la eliminación del proyecto
Route::delete('/proyectos/{id}', [DeleteProjectForIdController::class, 'delete'])->name('projects.delete');

// Ruta para manejar la búsqueda de proyectos
// Ruta para manejar la búsqueda de proyectos
Route::get('/proyectos/search', function (Request $request) {
    $id = $request->input('search_id');
    $proyecto = Proyecto::find($id);

    if ($proyecto === null) {
        return redirect()->route('projects.index')->with('error', 'Proyecto no encontrado');
    }

    return redirect()->route('projects.show', ['id' => $id]);
})->name('projects.search');
