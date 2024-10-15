<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-8">
                <h1 class="text-center text-xl px-4 mb-6 font-bold">Sistema de validación de diplomas UNIVER</h1>
                <div class="flex justify-center">
                    <img class=" size-28" src="{{ asset('img/logo-univer.png') }}" alt="Logo Univer">
                </div>
                @if($diploma)
                    <h2 class="text-center mt-8 font-bold text-lg mb-2">Datos del diploma</h2>
                    <article class="hover:animate-background rounded-xl bg-gradient-to-b from-blue-800 via-blue-800 to-yellow-400 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s] w-4/5 md:w-3/5 mx-auto" >
                        <div class="rounded-[10px] bg-white">
                            <div class="relative block overflow-hidden rounded-lg p-2 sm:p-4 lg:p-6 text-center">

                            <div class="sm:flex sm:justify-between sm:gap-4 ">
                                <div class=" w-full text-center">
                                    <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                                        Diplomado en {{ $diploma->diploma }}
                                    </h3>

                                    <p class="mt-1 text-xs font-medium text-gray-600">Otorgador por Universidad UNIVER</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-pretty text-sm text-indigo-500 text-center font-bold">
                                {{ $diploma->nombre }}</p>
                            </div>

                            <dl class="w-full mt-6 flex gap-4 sm:gap-6 text-center">
                                <div class="flex flex-col-reverse w-full">
                                    <dd class="text-xs text-gray-500">{{ $formattedDate }}</dd>
                                    <dt class="text-sm font-medium text-gray-600">Fecha de otorgamiento</dt>
                                </div>
                            </dl>
                            </div>
                        </div>
                    </article>
                    @else
                        <h2 class="text-center mt-8 font-bold text-lg mb-4 bg-red-800 text-white p-2">El folio no es valido</h2>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
