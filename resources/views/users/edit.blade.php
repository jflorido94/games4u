<x-app-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('editarperfil') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $datos->name }}"  required  />
            </div>

            <!-- Surname -->
            <div class="mt-2">
                <x-label for="surname" :value="__('Apellidos')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{ $datos->surname }}"  required  />
            </div>

            <!-- Nick -->
            <div class="mt-2">
                <x-label for="nick" :value="__('Usuario')" />

                <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" value="{{ $datos->nick }}"  required  />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $datos->email }}"  required />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-label for="passwordOld" :value="__('Contraseña actual')" />

                <x-input id="passwordOld" class="block mt-1 w-full"
                                type="password"
                                name="passwordOld"
                                required autocomplete="new-password" />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Nueva contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña nueva')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-between mt-2">
                <x-button class="ml-4">
                    {{ __('Actualizar') }}
                </x-button>
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ route('borrarperfil') }}" onclick="return confirm('¿Seguro que quieres eliminar tu usuario?')">Eliminar</a>

            </div>
        </form>
    </x-auth-card>
</x-app-layout>
