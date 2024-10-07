<div>
    <form wire:submit.prevent='generarDiplomas' class=" w-3/5 mx-auto">
        @csrf
        <div class=" mt-8">
            <x-input-label for="archivo" :value="__('Seleccionar Archivo')" />
            <input id="archivo" class="block mt-1 w-full border-2 border-gray-300" type="file" wire:model="archivo" required autofocus accept=".xlsx,.csv">
            <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
        </div>
        <div class="mt-8">
            @if($archivo)
                <button class="inline-flex items-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Generar Diplomas
                </button>
            @else
                <button disabled class="inline-flex items-center px-6 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest dark:hover:bg-white  dark:focus:bg-white dark:active:bg-gray-300 focus:outline-none">
                    Generar Diplomas
                </button>
            @endif
        </div>
    </form>
</div>
