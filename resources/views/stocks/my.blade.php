<x-app-layout>
    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4 flex justify-center">
                    <span>Mis juegos en venta </span>
                </div>
                <table class="min-w-max w-full table-auto items-center px-6 py-4">
                    <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Juego</th>
                            <th class="py-3 px-6 text-left">Plataforma</th>
                            <th class="py-3 px-6 text-left">Condicion</th>
                            <th class="py-3 px-6 text-center">Precio</th>
                            <th class="py-3 px-6 text-center">Estado</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-medium">

                        @foreach ($datos as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <span>{{ $item->game_id }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{ $item->platform_id }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{ $item->condition->name }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $item->price . ' €' }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($item->sell_id == null)
                                        <span
                                            class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Disponible</span>
                                    @else
                                        <span
                                            class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs">Vendido</span>
                                    @endif

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('juego', ['id' => $item->id]) }}" title="Detalles"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('editarjuego', ['id' => $item->id]) }}" title="Editar"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('borrarjuego', ['id' => $item->id]) }}" title="Eliminar"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" onclick="return confirm('¿Seguro que quieres eliminar este juego?')">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
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
