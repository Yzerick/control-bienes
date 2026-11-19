<DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Control - Bienes</title>
</head>
<body>
    <div class="flex h-screen"> <!-- contenedor principal -->
        <div class="w-80 h-full bg-blue-950 py-5 space-y-4 px-3"> <!-- barra de navegacion -->
                <div class="flex text-xl md:text-2xl font-bold tracking-wider text-cyan-500     "><!--titulo de la barra de navegacion -->
                    <div class="text-4xl">GESTION</div>
                    <div class="flex flex-col ml-2 text-center  text-white px-5">
                        <span class="text-orange-400 text-xs">y control</span>
                        <span class="text-orange-400 text-xs">de bienes</span>
                    </div>
                </div>
                <div class="flex flex-col ml-4 text-center  text-white px-5"><!--botones de la barra de navegacion -->
                   @include('layouts.menu')
                </div>
        </div><!-- fin barra de navegacion -->
              <div class="flex-1 bg-gray-100"> <!-- contenido -->
            
            <!-- encabezado -->
            <div class="p-6 bg-cyan-600 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-black text-amber-50">Bienvenido al Sistema de Control de Bienes</h1>
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
</body>
</html>