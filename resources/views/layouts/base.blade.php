<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Control - Bienes</title>
</head>
<body>
    <div class="flex h-screen overflow-hidden"> <!-- contenedor principal -->
        
        <!-- barra de navegacion -->
        <div class="w-80 shrink-0 h-full bg-blue-950 py-5 px-3 flex flex-col justify-between">
            
            <!-- Parte superior: Logo + Menú -->
            <div class="space-y-4">
                <div class="flex text-xl md:text-2xl font-bold tracking-wider text-cyan-500">
                    <div class="text-4xl">GESTION</div>
                    <div class="flex flex-col ml-2 text-center text-white px-5">
                        <span class="text-orange-400 text-xs">y control</span>
                        <span class="text-orange-400 text-xs">de bienes</span>
                    </div>
                </div>

                <div class="flex flex-col ml-4 text-center text-white px-5">
                    @include('layouts.menu')
                </div>
            </div>

            <!-- Cerrar Sesión pegado al final -->
            <div class="px-5 pt-4 border-t border-blue-900">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-600 text-white px-4 py-2.5 hover:bg-red-700 rounded-xl font-semibold transition">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>

        </div><!-- fin barra de navegacion -->

        <!-- contenedor de contenido derecho -->
        <div class="flex-1 bg-gray-100 flex flex-col overflow-y-auto">
            
            <!-- encabezado -->
            <div class="p-6 bg-cyan-600 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-black text-amber-50">Bienvenido al Sistema de Control de Bienes</h1>
                    <p class="text-cyan-100 text-sm capitalize">@yield('subtitulo')</p>
                </div>
                 
                <div>
                    @yield('boton-crear')
                </div>
            </div>

            <!-- contenido de cada vista -->
            <div class="p-6">
                @yield('contenido')
            </div>

        </div><!-- fin contenedor de contenido -->

    </div> <!-- fin contenedor principal -->
</body>
</html>
