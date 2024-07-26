<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Proyecto extends Model
{
    use HasFactory;

    private static $filePath;

    // Método estático para inicializar el archivo JSON
    private static function initializeFilePath()
    {
        self::$filePath = storage_path('app/proyectos.json');
    }

    public static function getAll()
    {
        if (!isset(self::$filePath)) {
            self::initializeFilePath();
        }

        if (!File::exists(self::$filePath)) {
            return [];
        }

        $json = File::get(self::$filePath);
        return json_decode($json, true);
    }

    public static function getById($id)
    {
        foreach (self::getAll() as $proyecto) {
            if ($proyecto['id'] == $id) {
                return $proyecto;
            }
        }
        return null;
    }

    public static function add($nuevoProyecto)
    {
        $proyectos = self::getAll();
        $proyectos[] = $nuevoProyecto;
        File::put(self::$filePath, json_encode($proyectos, JSON_PRETTY_PRINT));
    }

    public static function updateAll($proyectos)
    {
        File::put(self::$filePath, json_encode($proyectos, JSON_PRETTY_PRINT));
    }

    // Si deseas definir un método 'find' personalizado
    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
    
}




