<div>
    <div class=" overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacancies as $vacancy)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 mb-10 border bg-white dark:bg-gray-800 md:flex md:justify-between md:items-center">
                <div class="leading-10 border-black rounded-lg">
                    {{-- Titulo de el solicitante --}}
                    <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-xl font-bold hover:text-blue-600 pb-5">
                        {{ $vacancy->title }}
                    </a>
                    {{-- Compañia solicitante --}}
                    <p class="text-xs text-blue-600 hover:text-blue-800 pb-5">
                        {{ $vacancy->company }}
                    </p>
                    {{-- Ultimo dia de vacante --}}
                    <p class="text-sm text-gray-500">
                        {{ $vacancy->last_day->format('d/m/y') }}
                    </p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 md:items-center mt-5 md:mt-0">
                    {{-- Candidatos btn --}}
                    <a href="{{ route('candidates.index', $vacancy->id) }}"
                        {{-- wire:click="$emit('showCandidates',{{ $vacancy->id }})" --}}
                        {{-- wire:click="$dispatch('showCandidates',{{ $vacancy->id }})" --}}
                        class="bg-gray-600 hover:bg-gray-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Candidatos <span class="text-gray-400">({{ $vacancy->candidates->count() }})</span>
                    </a>
                    {{-- Editar btn --}}
                    <a href="{{ route('vacancies.edit', $vacancy->id) }}"
                        class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Editar
                    </a>
                    {{-- Eliminar btn --}}
                    <button wire:click="$dispatch('showDeleteConfirmation',{ vacancy: {{ $vacancy->id }} })"
                        class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Eliminar
                    </button>

                </div>
            </div>
        @empty
            <div
                class="p-6 text-gray-900 dark:text-gray-100 mb-10 border bg-white dark:bg-gray-800 md:flex md:justify-between md:items-center">
                <p class="text-xl-center text-gray-800 font-bold">No Existen Vacantes publica una</p>
            </div>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showDeleteConfirmation', vacancyId => {
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, elimínala!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Despachar un evento para eliminar la vacante
                    Livewire.dispatch('confirmDeleteVacancy', vacancyId);
                }
            });
        });

        // Escuchar el evento de eliminación exitosa desde el servidor
        Livewire.on('vacancyDeleted', () => {
            Swal.fire({
                title: "¡Eliminada!",
                text: "La vacante ha sido eliminada.",
                icon: "success"
            });
        });
    </script>
@endpush
