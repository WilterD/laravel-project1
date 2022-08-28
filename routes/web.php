<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodosController;

/*
|--------------------------------------------------------------------------
| TODO Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas', [TodosController::class, 'index'])->name('todos');


// traer controlador como clase y especificar el metodo que se va a ejecutar como si fuera un arreglo y importamos el controlador
Route::post('/tareas', [TodosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-edit');
Route::patch('/tareas{id}', [TodosController::class, 'update'])->name('todos-update');
Route::delete('/tareas', [TodosController::class, 'destroy'])->name('todos-destroy');

