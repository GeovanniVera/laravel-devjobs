<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Candidatos para la vacante: <span class="text-indigo-600 dark:text-indigo-400">{{ $vacancy->title }}</span>
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showEmpty: false }" x-init="setTimeout(() => showEmpty = true, 500)">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @forelse ($vacancy->candidates as $candidate)
                <div wire:key="candidate-{{ $candidate->id }}"
                    class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg flex flex-col md:flex-row items-start md:items-center justify-between
                           transform transition-all duration-300 hover:scale-[101%] hover:shadow-lg
                           border border-gray-200 dark:border-gray-700 mb-5 "
                    x-show="true" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 -translate-x-4">
                    <div class="p-6 flex-1">
                        <div class="flex  flex-col items-start ">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 animate-fade-in">
                                {{ $candidate->user->name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $candidate->user->email }}
                            </p>
                        </div>

                        <p class=" font-bold mt-2 flex items-center space-x-2">
                            Día en que se postulo: <span class="text-indigo-600 dark:text-indigo-400 ms-3"> {{ $candidate->vacancy->created_at->format('d/m/Y') }}</span>
                        </p>
                    </div>

                    <div class="p-6">
                        <a href="{{ asset('storage/cvs/' . $candidate->cv) }}" target="_blank" rel="noopener noreferrer"
                            class="bg-slate-600 hover:bg-slate-900 text-white font-semibold py-2 px-4 rounded-lg
                                   flex items-center space-x-2 transition-all duration-300 hover:shadow-md
                                   hover:translate-x-1">
                            <span>Ver CV</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-center mb-4" x-show="showEmpty"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100">
                    <p class="text-gray-600 dark:text-gray-400 flex items-center justify-center space-x-2">
                        <svg class="w-6 h-6 text-gray-400 me-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>No se encontraron candidatos</span>
                    </p>
                </div>
            @endforelse
        </div>
    </div> {{-- The best athlete wants his opponent at his best. --}}
</div>
