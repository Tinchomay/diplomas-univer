<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-2xl">Bienvenid@ al sistema de generación de diplomas</h1>

                    <p class="text-center mt-12 font-bold mb-6 text-lg">Selecciona a contiuacion una opcion</p>

                    <div class=" w-full flex justify-center">
                        <a href="{{ route('diploma') }}" class="px-4 py-2 text-white bg-indigo-700 rounded-lg mt-2 text-lg hover:bg-indigo-800">Generar 1 diploma</a>
                    </div>
                    <div class=" w-full flex justify-center mt-4">
                        <a href="{{ route('diplomas') }}" class="px-4 py-2 text-white bg-indigo-700 rounded-lg mt-2 text-lg hover:bg-indigo-800">Generar varios diplomas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
