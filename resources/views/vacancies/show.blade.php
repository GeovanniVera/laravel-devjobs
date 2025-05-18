<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacante: ' ) }} <span class="text-indigo-600 font-extrabold"> {{ $vacancy->title}} </span>
            - <span class="text-red-700"> {{$vacancy->last_day->format('d/m/Y')}}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:show-vacancy :vacancy="$vacancy" />
            </div>
        </div>
    </div>
</x-app-layout>
