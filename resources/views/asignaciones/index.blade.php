@extends('layouts.base')
@section('subtitulo', 'asignaciones')
@section('boton-crear')
<a href="{{ route('asignaciones.create') }}" class="inline-flex items-center gap-2 whitespace-nowrap shrink-0 bg-cyan-700 text-white px-4 py-2 rounded hover:bg-cyan-500 font-medium">
    Nueva Asignación
</a>
@endsection

@section('contenido')
<h1 class="text-xl font-bold text-gray-800 mb-4">Lista de asignaciones</h1>

@if(session('correcto'))
<div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
    {{ session('correcto') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="w-full overflow-auto">
    <table class="min-w-full shadow-2xs bg-white rounded overflow-hidden">
        <thead class="bg-gray-200 border border-gray-300 text-gray-700">
            <tr>
                <th class="py-2 text-left px-3">Código Bien</th>
                <th class="py-2 text-left px-3">Bien Asignado</th>
                <th class="py-2 text-left px-3">Usuario Responsable</th>
                <th class="py-2 text-left px-3">Fecha Entrega</th>
                <th class="py-2 text-left px-3">Observación</th>
                <th class="py-2 text-left px-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($asignaciones as $asignacion)
            <tr class="hover:bg-gray-50">
                <td class="px-3 py-2 border-b border-gray-300 border-l font-mono font-semibold text-cyan-700">
                    {{ $asignacion->bien->codigo ?? '-' }}
                </td>
                <td class="px-3 py-2 border-b border-gray-300 font-medium">
                    {{ $asignacion->bien->nombre ?? 'Bien eliminado' }}
                </td>
                <td class="px-3 py-2 border-b border-gray-300">
                    {{ $asignacion->usuario ? $asignacion->usuario->nombre . ' ' . $asignacion->usuario->apellido : 'Usuario eliminado' }}
                </td>
                <td class="px-3 py-2 border-b border-gray-300">{{ $asignacion->fecha_entrega }}</td>
                <td class="px-3 py-2 border-b border-gray-300">{{ $asignacion->observacion ?? 'Sin observaciones' }}</td>
                <td class="px-3 py-2 border-b border-gray-300 border-r flex space-x-1">
                    <a href="{{ route('asignaciones.edit', $asignacion->id) }}" class="px-4 py-1 bg-green-600 hover:bg-green-700 text-white rounded">
                        Editar
                    </a>
                    <button type="button" class="rounded px-4 py-1 bg-red-600 hover:bg-red-700 text-white" 
                        onclick="document.getElementById('modal-delete-{{ $asignacion->id }}').classList.remove('hidden')">
                        Eliminar
                    </button>

                    <!-- CONFIRMAR ELIMINAR -->
                    <div class="fixed inset-0 bg-black/30 z-50 hidden" id="modal-delete-{{ $asignacion->id }}">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="bg-white p-5 rounded shadow-lg max-w-sm w-full">
                                <h1 class="bg-red-500 text-white font-bold p-2 rounded">Confirmar Eliminación</h1>
                                <p class="px-2 mt-4 mb-4 text-gray-700">
                                    ¿Estás seguro de que deseas eliminar esta asignación del bien "{{ $asignacion->bien->nombre ?? '' }}"?
                                </p>
                                <div class="bg-gray-100 p-2 rounded flex justify-end space-x-2">
                                    <button type="button" class="px-4 py-1 bg-gray-400 hover:bg-gray-500 text-white rounded" 
                                        onclick="document.getElementById('modal-delete-{{ $asignacion->id }}').classList.add('hidden')">
                                        Cancelar
                                    </button>
                                    <form action="{{ route('asignaciones.destroy', $asignacion->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-1 bg-red-600 hover:bg-red-700 text-white rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-6 text-center text-gray-500 border border-gray-300">
                    No hay asignaciones registradas todavía. Haz clic en "Nueva Asignación" para crear la primera.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
