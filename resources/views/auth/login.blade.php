<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Control de Bienes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-black text-blue-950">CONTROL DE BIENES</h1>
            <p class="text-sm text-gray-500 mt-1">Ingresa tus credenciales para continuar</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white text-sm p-3 rounded-lg mb-4">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3.5 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
                <input type="password" name="password" required
                    class="w-full px-3.5 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600">
            </div>

            <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2.5 rounded-lg transition">
                Iniciar Sesión
            </button>
        </form>
    </div>
</body>
</html>

