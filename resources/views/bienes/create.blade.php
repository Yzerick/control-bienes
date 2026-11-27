@extends('layouts.base')
@section('subtitulo', 'Nuevo bien')
@section('boton-crear')
    <a href="{{ route('bienes.index') }}" class="inline-flex items-center gap-2 whitespace-nowrap shrink-0 bg-red-700 text-white px-4 py-2 rounded hover:bg-red-500">
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

    <form action="{{ route('bienes.store') }}" method="post" class="grid grid-cols-2 gap-4 bg-white p-6 rounded shadow">
        @csrf

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Código Patrimonial *</label>
            <input type="text" name="codigo" placeholder="Ej: BN-001" value="{{ old('codigo') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Nombre del Bien *</label>
            <input type="text" name="nombre" placeholder="Ej: Laptop HP ProBook" value="{{ old('nombre') }}" required
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Marca</label>
            <input type="text" name="marca" placeholder="Ej: HP" value="{{ old('marca') }}"
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Modelo</label>
            <input type="text" name="modelo" placeholder="Ej: ProBook 450 G8" value="{{ old('modelo') }}"
                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-cyan-600"/>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Categoría *</label>
            <select name="categoria_id" required class="border border-gray-300 rounded px-2 py-1.5 bg-white focus:outline-none focus:border-cyan-600">
                <option value="" disabled selected>Seleccione una categoría...</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col">
            <label class="font-semibold text-gray-700 mb-1">Ubicación *</label>
            <select name="ubicacion_id" required class="border border-gray-300 rounded px-2 py-1.5 bg-white focus:outline-none focus:border-cyan-600">
                <option value="" disabled selected>Seleccione una ubicación...</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}" {{ old('ubicacion_id') == $ubicacion->id ? 'selected' : '' }}>
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col col-span-2">
            <label class="font-semibold text-gray-700 mb-1">Estado *</label>
            <select name="estado" required class="border border-gray-300 rounded px-2 py-1.5 bg-white focus:outline-none focus:border-cyan-600">
                <option value="Disponible" {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Regular" {{ old('estado') == 'Regular' ? 'selected' : '' }}>Regular</option>
                <option value="Mantenimiento" {{ old('estado') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                <option value="Inoperativo" {{ old('estado') == 'Inoperativo' ? 'selected' : '' }}>Inoperativo</option>
            </select>
        </div>
        
        <div class="col-span-2 mt-2">
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-500">
                Guardar
            </button>
        </div>
    </form>
@endsection
