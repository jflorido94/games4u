<x-app-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('guardarjuego', ['id' => $datos->id]) }}">
            @csrf

            <!-- Juego -->
            <div class="mt-2">
                <label class="block font-medium text-gray-700">{{ 'Juego: ' . $datos->game->name }}</label>
            </div>

            <!-- Plataforma -->
            <div class="mt-2">
                <label class="block font-medium text-gray-700">{{ 'Plataforma: ' . $datos->plat->name }}</label>
            </div>

            <!-- Vendedor -->
            <div class="mt-2">
                <label class="block font-medium text-gray-700">{{ 'Vendedor: ' . $datos->user->nick }}</label>
            </div>

            @if ($datos->sell_id != null)
                <!-- Condicion -->
                <div class="mt-2">
                    <label
                        class="block font-medium text-gray-700">{{ 'Condición: ' . $datos->condition->name }}</label>
                </div>

                <!-- Descripcion -->
                <div class="mx-4">
                    <label class="block font-light text-xs text-gray-700">{{ $datos->condition->description }}</label>
                </div>

                <!-- Precio -->
                <div class="mt-2">
                    <label class="block font-medium text-gray-700">{{ 'Precio: ' . $datos->price . ' €' }}</label>
                </div>

            @else
                <div class="mt-2">
                    <x-label for="price" :value="__('Precio')" />

                    <x-input id="price" class="block mt-1 w-full" type="number" step=".01" name="price"
                        value="{{ $datos->price }}" required />
                </div>

                <div class="mt-2">
                    <x-label for="condition_id" :value="__('Condicion')" />

                    <select name="condition_id"
                        class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                        @foreach ($conditions as $item)
                            <option value="{{ $item->id }}"
                                {{ $datos->condition_id == $item->id ? ' selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

            @endif

            <!-- Estado -->
            <div class="mt-2 flex items-center justify-between">
                @if ($datos->sell_id == null)
                    <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full ">Disponible</span>
                @else
                    <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full ">Vendido</span>
                @endif

                @if ($datos->sell_id == null)
                    <x-button class="ml-4">
                        {{ __('Guardar') }}
                    </x-button>
                @endif

                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ route('misjuegos') }}">Volver</a>

            </div>
    </x-auth-card>
</x-app-layout>
