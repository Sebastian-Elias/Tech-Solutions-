<?php

namespace App\Http\Controllers;

use App\Models\MantenedorModel;
use Illuminate\Http\Request;

class ControladorCrearProyecto extends Controller
{
    public function get($_id){
        if ($_id == NULL){
            //retorna todo
            return "debe retornar todo";
        }else{
            //retorna solo el valor del ID
            return "valores del id: {$_id}";
        }
    }

    public function new($_nuevo){
        //objeto nuevo
        $registro = new MantenedorModel();
        $registro ->setId($_nuevo->getId());
    }

    public function update($_id, $_nuevo){
        //para actualizar un registro $_id
        //UPDATE tabla SET atributo WHERE id = $_id
    }

    public function delete($_id){}
    //para eliminar un registro




}
