<x-app-layout>
    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4">
                    Usuarios
                </div>
                <table class="min-w-max w-full table-auto items-center px-6 py-4">
                    <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Usuario</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Rol</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                            <th class="py-3 px-6 text-center">Pruebas</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-medium">

                        @foreach ($datos as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full"
                                                src="https://randomuser.me/api/portraits/men/1.jpg" />
                                        </div>
                                        <span>{{ $item->nick }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left ">
                                    <span>{{ $item->name . ' ' . $item->surname }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{ $item->email }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($item->admin == 1)
                                        <span
                                            class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Administrador</span>
                                    @else
                                        <span
                                            class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs">Usuario</span>
                                    @endif

                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}" title="Detalles"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}" title="Mensajes"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-comments"></i>
                                        </a>
                                        <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}" title="Eliminar"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    @if ($item->sells->count() != 0)

                                        <span>{{ $item->sells->first()->stocks->first()->id }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-gray-200 px-6 py-4">
                    {{ $datos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
