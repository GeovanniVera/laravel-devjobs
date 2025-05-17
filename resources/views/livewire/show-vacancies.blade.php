<div>
    <div class=" overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacancies as $vacancy)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 mb-10 border bg-white dark:bg-gray-800 md:flex md:justify-between md:items-center">
                <div class="leading-10 border-black rounded-lg">
                    {{-- Titulo de el solicitante --}}
                    <a href="#" class="text-xl font-bold hover:text-blue-600 pb-5">
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
                    <a href="#"
                        class="bg-gray-600 hover:bg-gray-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Candidatos
                    </a>
                    {{-- Editar btn --}}
                    <a href="{{ route('vacancies.edit',$vacancy->id) }}"
                        class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Editar
                    </a>
                    {{-- Eliminar btn --}}
                    <a href="#"
                        class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded-md text-xs font-bold text-center">
                        Eliminar
                    </a>

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
