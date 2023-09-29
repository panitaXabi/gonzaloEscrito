<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tareas extends Controller
{

public function index()
{
    $tareas = Tarea::all();
    return view('tareas', compact('tareas'));
}


    public function update(Request $request, $id)
    {
        $Tareas = Post::findOrFail($id);

        $validation = Validator::make($request->all(), [
            'titulo' => 'nullable|string|max:255',
            'contenido' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'autor' => 'required|string|max:500',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        $Tareas->titulo = $request->input('titulo');
        $Tareas->contenido = $request->input('contenido');
        $Tareas->estado = $request->input('estado');
        $Tareas->autor = $request->input('autor');
        $Tareas->save();

        return response()->json(['message' => 'Se creo la tarea '], 200);
    }

    public function destroy($id)
    {
        $Tareas = Post::findOrFail($id);


        $post->delete();

        return response()->json(['message' => 'Se elimino el deber'], 200);
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(), [
            'titulo' => 'nullable|string|max:255',
            'contenido' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'autor' => 'required|string|max:500',
        ]);

        if ($validation->fails()) {
            return $validation->errors();
        }

        return $this->createUser($request);
    }


    public function buscar(Request $request)
    {
        $titulo = $request->input('titulo');
        $autor = $request->input('autor');
        $estado = $request->input('estado');

        $query = Tarea::query();

        if ($titulo) {
            $query->where('titulo', 'like', "%$titulo%");
        }

        if ($autor) {
            $query->where('autor', 'like', "%$autor%");
        }

        if ($estado) {
            $query->where('estado', $estado);
        }

        return $query->get();
        return view('tareas', compact('tareas'));
    }
}
