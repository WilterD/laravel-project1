<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Category; // TODO Importar Modelo de Categorias

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // TODO CategoriesController
    public function index()
    {
     $categories = Category::all(); // TODO obtener todas las categorias
        return view('categories.index', [
            'categories' => $categories
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id); // TODO obtener la categoria por el id
        return view('categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id); // TODO obtener la categoria por el id
        $category->name = $request->name; // TODO asignar el nombre de la categoria
        $category->color = $request->color; // TODO asignar el color de la categoria
        $category->save(); // TODO guardar la categoria en la base de datos
        return redirect()->route('categories.show', [
            'category' => $category
        ])->with('success', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::find($category); // TODO obtener la categoria por el id
        $category->delete(); // TODO eliminar la categoria
        return redirect()->route('categories.index')->with('success', 'Categoria eliminada con exito');
    }
}
