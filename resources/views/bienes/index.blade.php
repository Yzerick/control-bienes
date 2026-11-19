@extends('layouts.base')
@section('subtitulo', 'bienes')
@section('boton-crear')
<a href="{{ route('bienes.create') }}" class="inline-flex items-center gap-2 whitespace-nowrap shrink-0 bg-cyan-700 text-white px-4 py-2 rounded hover:bg-cyan-500 font-medium">
    Crear Bien
</a>
@endsection

@section('contenido')
<h1 class="text-xl font-bold text-gray-800 mb-4">Lista de bienes</h1>

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
                <th class="py-2 text-left px-3">Código</th>
                <th class="py-2 text-left px-3">Nombre</th>
                <th class="py-2 text-left px-3">Marca / Modelo</th>
                <th class="py-2 text-left px-3">Categoría</th>
                <th class="py-2 text-left px-3">Ubicación</th>
                <th class="py-2 text-left px-3">Estado</th>
                <th class="py-2 text-left px-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bienes as $bien)
            <tr class="hover:bg-gray-50">
                <td class="px-3 py-2 border-b border-gray-300 border-l font-mono font-semibold text-cyan-700">{{ $bien->codigo }}</td>
                <td class="px-3 py-2 border-b border-gray-300 font-medium">{{ $bien->nombre }}</td>
                <td class="px-3 py-2 border-b border-gray-300">{{ $bien->marca ?? '-' }} {{ $bien->modelo ? '/ ' . $bien->modelo : '' }}</td>
                <td class="px-3 py-2 border-b border-gray-300">{{ $bien->categoria->nombre ?? 'Sin categoría' }}</td>
                <td class="px-3 py-2 border-b border-gray-300">{{ $bien->ubicacion->nombre ?? 'Sin ubicación' }}</td>
                <td class="px-3 py-2 border-b border-gray-300">
                    @if($bien->estado == 'Bueno')
                        <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-semibold">Bueno</span>
                    @elseif($bien->estado == 'Regular')
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded text-xs font-semibold">Regular</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-0.5 rounded text-xs font-semibold">{{ $bien->estado }}</span>
                    @endif
                </td>
                <td class="px-3 py-2 border-b border-gray-300 border-r flex space-x-1">
                    <a href="{{ route('bienes.edit', $bien->id) }}" class="px-4 py-1 bg-green-600 hover:bg-green-700 text-white rounded">
                        Editar
                    </a>
                    <button type="button" class="rounded px-4 py-1 bg-red-600 hover:bg-red-700 text-white" 
                        onclick="document.getElementById('modal-delete-{{ $bien->id }}').classList.remove('hidden')">
                        Eliminar
                    </button>

                    <!-- CONFIRMAR ELIMINAR -->
                    <div class="fixed inset-0 bg-black/30 z-50 hidden" id="modal-delete-{{ $bien->id }}">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="bg-white p-5 rounded shadow-lg max-w-sm w-full">
                                <h1 class="bg-red-500 text-white font-bold p-2 rounded">Confirmar Eliminación</h1>
                                <p class="px-2 mt-4 mb-4 text-gray-700">
                                    ¿Estás seguro de que deseas eliminar el bien "{{ $bien->nombre }}" ({{ $bien->codigo }})?
                                </p>
                                <div class="bg-gray-100 p-2 rounded flex justify-end space-x-2">
                                    <button type="button" class="px-4 py-1 bg-gray-400 hover:bg-gray-500 text-white rounded" 
                                        onclick="document.getElementById('modal-delete-{{ $bien->id }}').classList.add('hidden')">
                                        Cancelar
                                    </button>
                                    <form action="{{ route('bienes.destroy', $bien->id) }}" method="post">
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
                <td colspan="7" class="py-6 text-center text-gray-500 border border-gray-300">
                    No hay bienes registrados todavía. Haz clic en "Crear Bien" para agregar el primero.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
