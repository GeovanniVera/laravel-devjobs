<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Animacion --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1 class="text-4xl font-bold mb-5">Notificaciones</h1>

                    @forelse ($notifications as $notification)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 mb-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <p class="text-sm font-bold text-gray-700 dark:text-gray-400">
                                {{ $notification->data['message'] }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $notification->data['vacancy_title'] }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-5">
                                {{ $notification->created_at->diffForHumans() }}</p>
                            @if ($notification->data['url'])
                                <a href="{{ $notification->data['url'] }}"
                                    class="text-sm transition-all duration-300 bg-blue-500 hover:bg-blue-900 dark:bg-blue-400 dark:hover:bg-blue-300  py-2 px-4 rounded-lg text-white shadow-lg">Ver
                                    Candidato</a>
                            @endif
                        </div>
                    @empty
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 mb-4 rounded-lg">
                            <p class="text-gray-800 dark:text-gray-200">No tienes notificaciones.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- Animacion --}}
        </div>
    </div>
</x-app-layout>
