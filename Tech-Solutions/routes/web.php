<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mantenedor', function () {
    $data = [
        'data' => [
            'atributo' => 'valor'
        ]
    ];
    return $data;
});

Route::get('/mantenedor', function () {
    $control = new MantenedorController();
    $retorno = $control->get(NULL);
    return $retorno;
});

Route::get('/mantenedor/{_id}', function ($_id) {
    $control = new MantenedorController();
    $retorno = $control->get($_id);
    return $retorno;
});
