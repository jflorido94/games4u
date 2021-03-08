<x-app-layout>
    <x-auth-card>

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

        <!-- Condicion -->
        <div class="mt-2">
            <label class="block font-medium text-gray-700">{{ 'Condición: ' . $datos->condition->name }}</label>
        </div>

        <!-- Descripcion -->
        <div class="mx-4">
            <label class="block font-light text-xs text-gray-700">{{ $datos->condition->description }}</label>
        </div>

        <!-- Precio -->
        <div class="mt-2">
            <label class="block font-medium text-gray-700">{{ 'Precio: ' . $datos->price ." €" }}</label>
        </div>

        <!-- Estado -->
        <div class="mt-2 flex items-center justify-between">
            @if ($datos->sell_id == null)
                <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full ">Disponible</span>
            @else
                <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full ">Vendido</span>
            @endif

            {{-- @auth --}}
            @if ( (!isset(Auth::user()->id) || $datos->user_id != Auth::user()->id) && $datos->sell_id == null)
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ route('comprar', ['id' => $datos->id]) }}">Comprar</a>
            @endif
            {{-- @endauth --}}

            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ route('catalogo') }}">Volver</a>

        </div>
    </x-auth-card>
</x-app-layout>
