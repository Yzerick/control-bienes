<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::get();
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        try {
            Ubicacion::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
            ]);

            return redirect()->route('ubicaciones.index')
                ->with('correcto', 'Ubicación creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('ubicaciones.index')
                ->with('error', 'Error al crear la ubicación '  );
        }
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        return view('ubicaciones.edit', compact('ubicacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        try {
            $ubicacion = Ubicacion::findOrFail($id);
            $ubicacion->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
            ]);

            return redirect()->route('ubicaciones.index')
                ->with('correcto', 'Ubicación actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('ubicaciones.index')
                ->with('error', 'Error al actualizar la ubicación '  );
        }
    }

    public function destroy($id)
    {
        try {
            $ubicacion = Ubicacion::findOrFail($id);
            $ubicacion->delete();
            return redirect()->route('ubicaciones.index')
                ->with('correcto', 'Ubicación eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('ubicaciones.index')
                ->with('error', 'Error al eliminar la ubicación '  );
        }
    }
}
