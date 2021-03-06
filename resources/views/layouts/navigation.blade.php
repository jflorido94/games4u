<nav x-data="{ open: false }" class="bg-white shadow-md ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('catalogo')" :active="request()->routeIs('catalogo')">
                        {{ __('Catálogo') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('usuarios')" :active="request()->routeIs('usuarios')">
                            {{ __('Usuarios') }}
                        </x-nav-link>

                        <x-nav-link :href="route('compras')" :active="request()->routeIs('compras')">
                            {{ __('Mis compras') }}
                        </x-nav-link>

                        <x-nav-link :href="route('misjuegos')" :active="request()->routeIs('misjuegos')">
                            {{ __('Mis juegos') }}
                        </x-nav-link>

                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            @guest
                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Registrarse') }}
                    </x-nav-link>
                </div>
            @endguest
            @auth

                <div class="hidden space-x-6 sm:flex sm:ml-6">

                    <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                        <!-- Buy -->
                        <x-nav-link :href="route('nuevoJuego')" :active="request()->routeIs('nuevoJuego')"
                            title="Vender nuevo juego">
                            <i class="fas fa-plus-circle"></i>
                            <!--Añadir juego -->
                        </x-nav-link>

                        <x-nav-link :href="route('mensajes')" :active="request()->routeIs('mensajes')" title="Mis Mensajes">
                            <span
                                class="bg-green-200 text-green-700 px-2 py-1 rounded-full text-xs">{{ session('CountMessages') }}</span>
                            <i class="far fa-envelope"></i>
                            <!--Mensajes -->
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-6 sm:flex sm:items-center sm:ml-6">


                        <x-dropdown align="right" class="">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->nick }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->

                                <x-dropdown-link :href="route('perfil')">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                                                                    this.closest('form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('catalogo')" :active="request()->routeIs('catalogo')">
                {{ __('Catálogo') }}
            </x-responsive-nav-link>

            @auth
            <x-responsive-nav-link :href="route('usuarios')" :active="request()->routeIs('usuarios')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('compras')" :active="request()->routeIs('compras')">
                {{ __('Mis compras') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('misjuegos')" :active="request()->routeIs('misjuegos')">
                {{ __('Mis juegos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('nuevoJuego')" :active="request()->routeIs('nuevoJuego')"
                title="Vender nuevo juego">
                <i class="fas fa-plus-circle"></i>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('mensajes')" :active="request()->routeIs('mensajes')"
                title="Mis Mensajes">
                <i class="far fa-envelope"></i>
                <span
                    class="bg-green-200 text-green-700 px-2 py-1 rounded-full text-xs">{{ session('CountMessages') }}</span>
            </x-responsive-nav-link>

            @endauth

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="ml-3">
                    @guest
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Registrarse') }}
                        </x-responsive-nav-link>
                    @endguest
                    @auth
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->nick }}</div>


                        <div class="mt-3 space-1">

                            <!-- Authentication -->

                            <x-responsive-nav-link :href="route('perfil')">
                                {{ __('Perfil') }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
