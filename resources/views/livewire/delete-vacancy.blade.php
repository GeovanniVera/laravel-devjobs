<div class="flex flex-col gap-4 mt-4">
    {{-- Editar btn --}}
    <a href="{{ route('vacancies.edit', $vacancy->id) }}"
        class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center w-full">
        Editar Vacante
    </a>
    {{-- Eliminar btn --}}
    <button wire:click="$dispatch('showDeleteConfirmation',{ vacancy: {{ $vacancy->id }} })"
        class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
        Eliminar Vacante
    </button>
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

