@extends('app')

@section('contenido')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos') }}" method="POST">
        @csrf

        @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        @endif


        @error('title')
        <h6 class="alert alert-danger">
            {{ $message }}
        </h6>
        @enderror
        <div class="mb-3">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" placeholder="Add a new todo">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>


    <div>
        @foreach ($todos as $todo)
        <div class="border-bottom p-2">
            <h6>{{ $todo->title }}</h6>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('todos-edit', $todo->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div>
                    <form action="{{ route('todos-destroy', $todo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>


    </div>




    @endsection