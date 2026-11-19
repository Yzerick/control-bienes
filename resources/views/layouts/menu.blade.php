<a href="{{ route('usuarios.index') }}" class="flex items-center gap-3 px-3 py-4 hover:bg-orange-400 rounded-2xl"><i class="fa-solid fa-user-group"></i>Usuarios</a>
<a href="{{ route('bienes.index') }}" class="flex items-center gap-3 px-3 py-4 hover:bg-orange-400 rounded-2xl"><i class="fa-solid fa-briefcase"></i> Bienes</a>
<a href="{{ route('categorias.index') }}" class="flex items-center gap-3 px-3 py-4 hover:bg-orange-400 rounded-2xl"><i class="fa-solid fa-tags"></i> Categorias</a>
<a href="{{ route('ubicaciones.index') }}" class="flex items-center gap-3 px-3 py-4 hover:bg-orange-400 rounded-2xl"><i class="fa-solid fa-location-dot"></i> Ubicaciones</a>
<a href="{{ route('asignaciones.index') }}" class="flex items-center gap-3 px-3 py-4 hover:bg-orange-400 rounded-2xl"><i class="fa-solid fa-exchange-alt"></i>Asignaciones</a>
<form method="POST" action="{{ route('logout') }}" class="mt-8">
    @csrf
    <button type="submit" class="w-full flex items-center gap-3 px-3 py-4 text-red-400 hover:bg-red-600 hover:text-white rounded-2xl transition">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Cerrar Sesión</span>
    </button>
</form>
