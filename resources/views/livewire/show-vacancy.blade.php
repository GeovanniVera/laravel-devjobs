<div class="p-4 sm:p-6 rounded-lg max-w-4xl mx-auto my-4">
    {{-- Contenedir principal --}}
    <div class="flex flex-col md:flex-row gap-4 md:gap-8">
        <!-- Image Section -->
        <div class="md:w-1/3">
            <img src="{{ asset('storage/' . $vacancy->image) }}" alt="{{ $vacancy->title }}"
                class="w-full  rounded-lg transition-transform duration-300 hover:scale-102"
                loading="lazy" onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
        </div>

        <!-- Content Section -->
        <div class="md:w-2/3 flex flex-col justify-between">
            {{-- Contenedor de información --}}
            <div class="space-y-5">
                <div>
                    <h2
                        class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100 leading-tight tracking-tight mb-2">
                        {{ $vacancy->title }}
                    </h2>
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                        {{ $vacancy->company }}
                    </p>
                </div>

                <div class="space-y-5" x-data="{ expanded: false }">
                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        <span x-show="!expanded">
                            {{ Str::limit($vacancy->description, 200, '...') }}
                        </span>

                        <span x-show="expanded" x-cloak>
                            {{ $vacancy->description }}
                        </span>

                        @if (strlen($vacancy->description) > 200)
                            <button @click="expanded = !expanded"
                                class="text-blue-600 dark:text-blue-400 hover:underline font-medium text-sm">
                                <span x-text="expanded ? 'Ver menos' : 'Ver más'"></span>
                            </button>
                        @endif
                    </div>
                    {{-- Inicio de Iconos de Información --}}
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 text-sm">
                        {{-- Empresa --}}
                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-2m-6 0H7m6-14h6m-6 4h6m-6 4h6" />
                            </svg>
                            <span class="text-green-600">{{ $vacancy->company }}</span>
                        </div>
                        {{-- Salario --}}
                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 8v1l-2.5 2.5m5 .5a5 5 0 11-10 0 5 5 0 0110 0z" />
                            </svg>
                            <span class="text-indigo-600">{{ $vacancy->salary->salary }}</span>
                        </div>
                        {{-- Fecha de cierre --}}
                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-red-600">{{ $vacancy->last_day->format('d/m/y') }}</span>
                        </div>

                        {{-- Fin de iconos de informacion --}}
                    </div>
                    {{-- Formulario para postularse --}}
                    @guest
                        <div class="flex items-center mt-4">
                            <a href="{{ route('login') }}"
                                class="text-blue-600 dark:text-blue-400 hover:underline font-medium text-sm">
                                Iniciar sesión para postularse
                            </a>
                        </div>
                    @endguest

                    @auth
                        @can('create', App\Models\Vacancy::class)
                            {{--Componente para eliminar o actualizar la vacante solo si el usuario es el propietario --}}
                            @if (auth()->user()->vacancies->contains($vacancy))
                                <livewire:delete-vacancy :vacancy="$vacancy" />
                            @endif
                        @else
                            {{-- Formulario para postularse --}}
                            <livewire:postulate-vacancy :vacancy="$vacancy" />
                        @endcan
                    @endauth

                </div>
                {{-- Div que contiene la informacion --}}
            </div>
        </div>
    </div>
</div>
