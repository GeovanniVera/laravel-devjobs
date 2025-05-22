<div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @else
        @if (auth()->user()->candidates()->where('vacancy_id', $vacancy->id)->exists())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Atención!</strong>
                <span class="block sm:inline">Ya has postulado a esta vacante.</span>
            </div>
            {{-- Eliminar la postulación con sweetAlert --}}
            <button type="button"
                class="mt-4 bg-red-600 hover:bg-red-800 transition-all duration-500 text-white py-2 px-4 w-full rounded-md"
                wire:click="$dispatch('showDeleteConfirmation', {postulate: {{ auth()->user()->candidates()->where('vacancy_id', $vacancy->id)->first()->id }}})">
                Eliminar Postulación
            </button>
        @else
            <form wire:submit.prevent="postulate" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <div class="flex flex-col gap-4">
                    <label for="cv" class="text-gray-700 dark:text-gray-300">Sube tu CV para postularte.</label>
                    <input type="file" id="cv" wire:model="cv" accept=".pdf"
                        class="border border-gray-300 rounded-md p-2">
                </div>
                @error('cv')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <button type="submit"
                    class="mt-4 bg-blue-600 hover:bg-blue-800 transition-all duration-500 text-white py-2 px-4 w-full rounded-md">Postular</button>
            </form>
        @endif
    @endif

</div>


@push('scripts')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Eliminar la postulacion para user->role->1 --}}
    <script>
        Livewire.on('showDeleteConfirmation', postulationId => {
            Swal.fire({
                title: "¿Eliminar Postulación?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, elimínala!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Despachar un evento para eliminar la postulación
                    Livewire.dispatch('confirmDeletePostulation', postulationId);
                }
            });
        });

        // Escuchar el evento de eliminación exitosa desde el servidor
        Livewire.on('postulationDeleted', () => {
            Swal.fire({
                title: "¡Eliminada!",
                text: "La postulación ha sido eliminada.",
                icon: "success"
            });
        });
    </script>
@endpush
