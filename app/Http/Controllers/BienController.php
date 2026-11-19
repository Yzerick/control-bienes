<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Categoria;
use App\Models\Ubicacion;

class BienController extends Controller
{
    public function index()
    {
        $bienes = Bien::with(['categoria', 'ubicacion'])->get();
        return view('bienes.index', compact('bienes'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        $ubicaciones = Ubicacion::get();
        return view('bienes.create', compact('categorias', 'ubicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:biens,codigo',
            'nombre' => 'required|string|max:255',
            'marca' => 'nullable|string|max:100',
            'modelo' => 'nullable|string|max:100',
            'estado' => 'required|string|max:50',
            'categoria_id' => 'required|exists:categorias,id',
            'ubicacion_id' => 'required|exists:ubicacions,id',
        ]);

        try {
            Bien::create($request->all());

            return redirect()->route('bienes.index')
                ->with('correcto', 'Bien registrado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('bienes.index')
                ->with('error', 'Error al registrar el bien.');
        }
    }

    public function edit($id)
    {
        $bien = Bien::findOrFail($id);
        $categorias = Categoria::get();
        $ubicaciones = Ubicacion::get();
        return view('bienes.edit', compact('bien', 'categorias', 'ubicaciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:biens,codigo,' . $id,
            'nombre' => 'required|string|max:255',
            'marca' => 'nullable|string|max:100',
            'modelo' => 'nullable|string|max:100',
            'estado' => 'required|string|max:50',
            'categoria_id' => 'required|exists:categorias,id',
            'ubicacion_id' => 'required|exists:ubicacions,id',
        ]);

        try {
            $bien = Bien::findOrFail($id);
            $bien->update($request->all());

            return redirect()->route('bienes.index')
                ->with('correcto', 'Bien actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('bienes.index')
                ->with('error', 'Error al actualizar el bien.');
        }
    }

    public function destroy($id)
    {
        try {
            $bien = Bien::findOrFail($id);
            $bien->delete();
            return redirect()->route('bienes.index')
                ->with('correcto', 'Bien eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('bienes.index')
                ->with('error', 'Error al eliminar el bien.');
        }
    }
}
