@extends('app')

@section('contenido')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos-update' , ['id' => $todo->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        @if (session('success'))
        <h6 class="alert alert-success">
            {{ session('success') }}
        </h6>

        @endif

        @error('title')
        <h6 class="alert alert-danger">
            {{ $message }}
        </h6>
        @enderror
        <div class="mb-3">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" placeholder="Add a new todo" value="{{$todo->title}}">
            <button class="btn btn-primary" type="submit">Actualizar Tarea</button>
        </div>
    </form>


   


</div>




@endsection

<!-- TODO mi Formulario -->