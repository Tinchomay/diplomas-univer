<div>
    <form method="POST" action="{{ route('generarDiploma') }}" class=" md:w-3/5 mx-auto" x-data="{ submitting: false }" @submit="submitting = true">
        @csrf
        <div class=" mt-4">
            <x-input-label for="nombre" :value="__('Nombre Alumno')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" placeholder="Nombre del alumno" name="nombre" :value="old('nombre')" required autofocus/>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <div class=" mt-4">
            <x-input-label for="programa" :value="__('Programa')" />
            <x-text-input id="programa" class="block mt-1 w-full" type="text" placeholder="Programa" name="programa" :value="old('programa')" required autofocus/>
            <x-input-error :messages="$errors->get('programa')" class="mt-2" />
        </div>
        <div class=" mt-4">
            <x-input-label for="folio" :value="__('Folio')" />
            <x-text-input id="folio" class="block mt-1 w-full" type="text" placeholder="Folio del alumno" name="folio" :value="old('folio')" required autofocus/>
            <x-input-error :messages="$errors->get('folio')" class="mt-2" />
        </div>
        <div class=" mt-4">
            <x-input-label for="fecha" :value="__('fecha')" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required autofocus/>
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

        <div>

        </div>
        <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" x-bind:disabled="submitting" x-bind:class="{ 'cursor-not-allowed opacity-50': submitting }">
            Generar Diploma
            </button>
        </div>
    </form>
</div>
