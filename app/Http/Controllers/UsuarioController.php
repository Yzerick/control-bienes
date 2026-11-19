<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:usuarios,dni',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
        ]);

        try {
            Usuario::create([
                'dni' => $request->dni,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'rol' => $request->rol,
            ]);

            return redirect()->route('usuarios.index')
                ->with('correcto', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Error al crear el usuario: ');
        }
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:usuarios,dni,' . $id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
        ]);

        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->update([
                'dni' => $request->dni,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'rol' => $request->rol,
            ]);

            return redirect()->route('usuarios.index')
                ->with('correcto', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();
            return redirect()->route('usuarios.index')
                ->with('correcto', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
}
