<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Diplomas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-2xl">Generar varios diplomas</h1>
                    <p class="text-center mt-4 font-bold">Para generar varios diplomas tiene que subir su archivo en formato .csv a continuación</p>
                    <livewire:diplomas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
