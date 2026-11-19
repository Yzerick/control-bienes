@extends('layouts.base')
@section('subtitulo', 'Nuevo usuario')
@section('boton-crear')
    <a href="{{ route('usuarios.index') }}" class="inline-flex items-center gap-2 whitespace-nowrap shrink-0  bg-indigo-400 text-white px-4 py-2 rounded hover:bg-red-800">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Regresar</span>
</a>

@endsection

@section('contenido')
    @if ($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="post" class="grid grid-cols-2 gap-4 bg-white p-6 rounded shadow">
        @csrf

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">DNI *</label>
            <input type="text" name="dni" maxlength="8" pattern="[0-9]{8}" value="{{ old('dni') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Apellido *</label>
            <input type="text" name="apellido" value="{{ old('apellido') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Rol *</label>
            <input type="text" name="rol" value="{{ old('rol') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>
        
        <div class="col-span-2 mt-2">
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-500">
                Guardar
            </button>
        </div>
    </form>
@endsection
