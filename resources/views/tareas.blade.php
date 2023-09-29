
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tareas</h1>

        <form method="GET" action="{{ route('buscar') }}">
            <div class="form-group">
                <input type="text" name="titulo" placeholder="Título">
                <input type="text" name="autor" placeholder="Autor">
                <input type="text" name="estado" placeholder="Estado">
                <button type="submit">Buscar</button>
            </div>
        </form>

    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Estado</th>
                    <th>Autor</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ $tarea->contenido }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->autor }}</td>
                        <td>{{ $tarea->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
