<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Encuentra tu trabajo ideal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-600 shadow-xl sm:rounded-lg">
                <div class="px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <div class="relative">
                            <h2
                                class="text-center text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                                Encuentra un trabajo en Tech de forma remota</h2>
                            <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-white">Encuentra el trabajo de
                                tus sueños en una empresa internacional; tenemos vacantes para front end developer,
                                backend, devops, mobile y mucho más!</p>
                        </div>

                        <!-- Search Form -->
                        <div class="max-w-2xl mx-auto mt-12">
                            <div class="flex gap-4">
                                <a class="px-12 py-4 text-lg font-semibold text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600  m-auto"
                                    href="{{ route('home') }}">Ver las ofertas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</x-app-layout>
