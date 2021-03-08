<x-app-layout>
    <x-auth-card>

        <!-- Nick -->
        <div class="mt-2">
            <label class="block font-medium text-gray-700">{{ 'Usuario: ' . $datos->nick }}</label>
        </div>

        <!-- Name -->
        <div class="mt-2">
            <label
                class="block font-medium text-gray-700">{{ 'Nombre: ' . $datos->name . ' ' . $datos->surname }}</label>
        </div>

        <!-- Email Address -->
        <div class="mt-2">
            <label class="block font-medium text-gray-700">{{ 'Email: ' . $datos->email }}</label>
        </div>

        <!-- buys -->
        <div class="mt-2">
            <label
                class="block font-medium text-gray-700">{{ 'Compras realizadas: ' . $datos->sells->count() }}</label>
        </div>

        <!-- games on sell -->
        <div class="mt-2">
            <label
                class="block font-medium text-gray-700">{{ 'Juegos en venta: ' . $datos->stocks->where('sell_id', null)->count() }}</label>
        </div>

        <div class="flex items-center justify-center mt-2">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ route('usuarios') }}">Volver</a>
        </div>
    </x-auth-card>
</x-app-layout>
