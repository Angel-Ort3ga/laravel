<?php

use Illuminate\Support\Facades\Route;

Route::get('/saludo/{name}', function ($name) {
    return 'hello word '.$name;
})->where('name', '[A-Za-z]+');;

Route::get('/nombre/{name}/{apellido?}', function ( $name, $apellido = null) {
    $nombreCompleto = $apellido ? '$name $apellido' : $name;
    return 'Hello '.$nombreCompleto;
})->where('name', '[A-Za-z]+')
  ->where('apellido', '[A-Za-z]+');

Route::get('/operacion/{operation}/{num1}/{num2}', function ($operation, $num1, $num2) {
    switch ($operation) {
        case 'suma':
            $result = $num1 + $num2;
            break;
        case 'resta':
            $result = $num1 - $num2;
            break;
        case 'multiplicacion':
            $result = $num1 * $num2;
            break;
        case 'division':
            if ($num2 == 0) {
                return 'Error: No se puede dividir entre cero.';
            }
            $result = $num1 / $num2;
            break;
        default:
            return 'Operación no válida.';
    }
    return "El resultado de la $operation entre $num1 y $num2 es: $result";
})->where('operation', 'suma|resta|multiplicacion|division')
->where('num1', '[0-9]+')
->where('num2', '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});
