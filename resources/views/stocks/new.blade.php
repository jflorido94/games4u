<x-app-layout>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('addJuego') }}">
            @csrf

            <div class="mt-2">
                <x-label for="game_id" :value="__('Juego')" />

                <select name="game_id"
                    class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                    @foreach ($games as $item)
                        <option value="{{ $item['id'] }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <x-label for="platform_id" :value="__('Plataforma')" />

                <select name="platform_id"
                    class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                    @foreach ($plats as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mt-2">
                <x-label for="price" :value="__('Precio')" />

                <x-input id="price" class="block mt-1 w-full" type="number" step=".01" name="price" required />
            </div>

            <div class="mt-2">
                <x-label for="condition_id" :value="__('Condicion')" />

                <select name="condition_id"
                    class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                    @foreach ($conditions as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Estado -->
            <div class="mt-2 flex items-center justify-between">

                <x-button class="ml-4">
                    {{ __('Guardar') }}
                </x-button>

                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ route('misjuegos') }}">Volver</a>

            </div>
    </x-auth-card>
</x-app-layout>
