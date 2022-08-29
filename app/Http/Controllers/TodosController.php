<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; // Importar Modelo



class TodosController extends Controller
{
    // nombres de las funciones de controladores
    // index para mostrar todos los registros
    // store para guardar un nuevo registro
    // update para actualizar un registro
    // destroy para eliminar un registro
    // edit para mostrar el formulario de edicion

    public function index()
    {

        $todos = Todo::all();

        return view('todos.index', [
            'todos' => $todos
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
        ]);

        // TODO guardar el registro en la base de datos
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->fecha = $request->fecha;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
    }



    
    public function update(Request $request, $id)
    {

        $todo = Todo::find($id);
        $todo->title = $request->title; // actualizar el titulo

        $todo->save();

        // return view('todo.index', [
        //     'success' => 'Tarea Actualizada correctamente!'
        // ]);

        return redirect()->route('todos')->with('success', 'Tarea Actualizada correctamente!');
    }

    public function destroy($id)
    {

        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea Eliminada correctamente!');
    }
}
