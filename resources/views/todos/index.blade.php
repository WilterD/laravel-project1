@extends('app')

@section('contenido')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('todos')}}">
        @csrf

        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
            <label for="title" class="form-label">Título del evento</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Título">

            <label for="description" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control mb-2" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción del evento"></textarea>

            <label for="start_date" class="form-label">Fecha del Evento</label>
            <input type="date" class="form-control mb-2" name="fecha" id="exampleFormControlInput1">

            <!-- <label for="exampleColorInput" class="form-label">Escoge un color para el evento</label>
                <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="#563d7c"> -->



            <input type="submit" value="Crear Evento" class="btn btn-primary my-2" />
        </div>
    </form>

    <div >
        @foreach ($todos as $todo)
        
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>
    </div>
</div>
@endsection