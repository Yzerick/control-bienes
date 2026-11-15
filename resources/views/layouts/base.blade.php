<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Control - Bienes</title>
</head>
<body>
    <div class="flex h-screen"> <!-- contenedor principal -->
        <div class="w-80 h-full bg-blue-950 "> <!-- barra de navegacion -->
                <div class="pt-6 ml-4 mb-12 text-xl md:text-2xl font-bold tracking-wider text-cyan-500     "><!--titulo de la barra de navegacion -->
                    <h1>GESTIÓN Y CONTROL DE BIENES</h1>
                </div>
                <div class="flex flex-col gap-5 ml-4 text-white "><!--botones de la barra de navegacion -->
                   @include('layouts.menu')
                </div>
        </div><!-- fin barra de navegacion -->
        <div><!-- contenedor de contenido -->
            @yield('contenido')
        </div><!-- fin contenedor de contenido -->

    </div> <!-- fin contenedor principal -->
</body>
</html>