<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenedorModel extends Model
{
    use HasFactory;

    protected $table = 'mantenedores'; 

    protected $primaryKey = 'id';

    //La clave primaria es un número entero
    public $incrementing = true;

    // Si la tabla tiene campos de marca de tiempo
    public $timestamps = false;

    // Definición de campos que son asignables en masa
    protected $fillable = [
        'id',
        'nombre',
        'activo'
    ];

    // Métodos para acceder y modificar atributos
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getNombre()
    {
        return $this->attributes['nombre'];
    }

    public function setNombre($nombre)
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function isActivo()
    {
        return $this->attributes['activo'];
    }

    public function setActivo($activo)
    {
        $this->attributes['activo'] = $activo;
    }

    // Métodos estáticos para manejar datos genéricos 
    public static function getAll()
    {
        return self::all();
    }

    public static function getById($id)
    {
        return self::find($id);
    }
}

