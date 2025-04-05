<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Bolsa de Trabajo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/3  bg-neutral-900 text-white flex flex-col justify-between p-10 lg:flex">
        <div>
            <h1 class="text-3xl font-bold">Laravel</h1>
        </div>
        <blockquote class="text-gray-400 text-sm">
            “It is quality rather than quantity that matters.” <br>
            <span class="text-gray-500">- Lucius Annaeus Seneca</span>
        </blockquote>
    </aside>
    
    <!-- Main Content -->
    <main class="w-full lg:w-2/3 flex flex-col justify-center items-center px-6 lg:px-16 bg-white shadow-md">
        <div class="max-w-3xl text-center space-y-8">
            <h1 class="text-5xl font-extrabold text-gray-900">Bienvenido a la Plataforma de Ofertas Laborales</h1>
            <p class="text-gray-600 text-lg">Explora oportunidades laborales o publica ofertas de empleo de manera fácil y rápida.</p>
            
            <div class="mt-8 flex flex-col items-center space-y-5">
                @auth
                    <a href="{{ url('/offers') }}" class="px-10 py-4 bg-black text-white rounded-full text-lg font-semibold hover:bg-gray-800 transition-all shadow-lg">
                        Ver Ofertas
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-10 py-4 bg-black text-white rounded-full text-lg font-semibold hover:bg-gray-800 transition-all shadow-lg">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="px-10 py-4 bg-black text-white rounded-full text-lg font-semibold hover:bg-gray-800 transition-all shadow-lg">
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </main>
</body>
</html>