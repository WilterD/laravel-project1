<?php

namespace App\Http\Controllers;
use App\Models\Todo; // Importar Modelo

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class TodosController extends Controller
{
    // nombres de las funciones de controladores
    // index para mostrar todos los registros
    // store para guardar un nuevo registro
    // update para actualizar un registro
    // destroy para eliminar un registro
    // edit para mostrar el formulario de edicion

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
        ]);

        // TODO guardar el registro en la base de datos
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
       
        return redirect()->route('todos')->with('info', 'Todo created successfully');
        
    }


    public function index(){

        $todos = Todo::all();

        return view('todos.index', [
            'todos' => $todos
        ]);

    }
    
    public function show($id){

        $todo = Todo::find($id);

        return view('todos.show', 
        ['todo' => $todo]);

    }
    public function update(Request $request , $id){

        $todo = Todo::find($id);
        $todo->title = $request->title; // actualizar el titulo

        dd($request);

       

    }
    public function destroy(){

        $todos = Todo::all();

        return view('todos.index', [
            'todos' => $todos
        ]);

    }
}
