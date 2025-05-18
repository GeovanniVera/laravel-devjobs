<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-4xl w-full flex flex-col md:flex-row items-center gap-8 md:gap-12">
            <!-- Ilustración -->
            <div class="md:w-1/2 flex justify-center animate-float">
                <div class="relative w-48 h-48 md:w-64 md:h-64">
                    <div class="absolute inset-0 bg-red-100 dark:bg-red-900/20 rounded-full"></div>
                    <div
                        class="absolute inset-4 bg-white dark:bg-gray-800 shadow-lg rounded-full flex items-center justify-center">
                        <div class="text-red-500 dark:text-red-400">
                            <svg class="w-20 h-20 md:w-24 md:h-24" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido -->
            <div class="md:w-1/2 space-y-6 text-center md:text-left">
                <div class="space-y-3">
                    <h1 class="text-6xl md:text-8xl font-bold text-red-500 dark:text-red-400">
                        @yield('code')
                    </h1>

                    <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 dark:text-gray-100">
                        @yield('message')
                    </h2>

                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Algo salió mal. Por favor intenta nuevamente más tarde.
                    </p>
                </div>

                <div class="pt-4">
                    <a href="/"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition-colors duration-200 shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
