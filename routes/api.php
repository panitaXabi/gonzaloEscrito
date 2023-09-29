<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function ()
{
    Route::get('/tareas', [Tareas::class, 'index'])->name('tareas.index');
    Route::get('tareas/buscar', 'Tareas@buscar');
    Route::resource('tareas', 'Tareas');
    Route::post('/tareas',[UserController::class,"update"]);
    Route::post('/tareas',[UserController::class,"destroy"]);
    Route::post('/tareas',[UserController::class,"update"]);
});
