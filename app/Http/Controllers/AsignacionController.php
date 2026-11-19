<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignacion;
use App\Models\Bien;
use App\Models\Usuario;

class AsignacionController extends Controller
{
    public function index()
    {
        $asignaciones = Asignacion::with(['bien', 'usuario'])->get();
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $bienes = Bien::get();
        $usuarios = Usuario::get();
        return view('asignaciones.create', compact('bienes', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bien_id' => 'required|exists:biens,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_entrega' => 'required|date',
            'observacion' => 'nullable|string',
        ]);

        try {
            Asignacion::create($request->all());

            return redirect()->route('asignaciones.index')
                ->with('correcto', 'Asignación registrada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('asignaciones.index')
                ->with('error', 'Error al registrar la asignación.');
        }
    }

    public function edit($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $bienes = Bien::get();
        $usuarios = Usuario::get();
        return view('asignaciones.edit', compact('asignacion', 'bienes', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bien_id' => 'required|exists:biens,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_entrega' => 'required|date',
            'observacion' => 'nullable|string',
        ]);

        try {
            $asignacion = Asignacion::findOrFail($id);
            $asignacion->update($request->all());

            return redirect()->route('asignaciones.index')
                ->with('correcto', 'Asignación actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('asignaciones.index')
                ->with('error', 'Error al actualizar la asignación.');
        }
    }

    public function destroy($id)
    {
        try {
            $asignacion = Asignacion::findOrFail($id);
            $asignacion->delete();
            return redirect()->route('asignaciones.index')
                ->with('correcto', 'Asignación eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('asignaciones.index')
                ->with('error', 'Error al eliminar la asignación.');
        }
    }
}
