<div class=" ">
    <livewire:search-vacancy />
    <div class="grid gap-6 mt-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($vacancies as $vacancy)
            <!-- Job Card  -->
            <div class="p-6 transition bg-white rounded-lg shadow-lg dark:bg-gray-800 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            {{ $vacancy->title }}
                        </h4>
                        <p class="mt-2 text-indigo-600 dark:text-indigo-400">{{ $vacancy->company }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-gray-600 dark:text-gray-400">
                        <span class="font-medium">{{ $vacancy->created_at->format('d M, Y') }}</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium">💼 Contrato</span>
                    </p>

                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 text-sm rounded-full bg-indigo-50 text-indigo-600">
                            {{ $vacancy->category->category }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <span
                            class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $vacancy->salary->salary }}</span>
                        <a href="{{ route('vacancies.show', $vacancy->id) }}"
                            class="text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                            Ver oferta →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-6 transition bg-white rounded-lg shadow-sm dark:bg-gray-800 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            No hay ofertas disponibles
                        </h4>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
    <div class="flex items-start justify-center w-full mt-4">
            {{ $vacancies->links() }}
    </div>


</div>
