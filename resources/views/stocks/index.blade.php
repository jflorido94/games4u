<x-app-layout>
    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">

                    <div class="card">
                        <div class="card-header">
                            Catalogo
                        </div>
                        <table class="min-w-max w-full table-auto card-body">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Juego</th>
                                    <th class="py-3 px-6 text-left">Plataforma</th>
                                    <th class="py-3 px-6 text-left">Condicion</th>
                                    <th class="py-3 px-6 text-center">Vendedor</th>
                                    <th class="py-3 px-6 text-center">Precio</th>
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
                                            <span>{{ $item->user->nick }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span>{{ $item->price ." €"}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}"
                                                    title="Detalles"
                                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}"
                                                    title="Comprar"
                                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                                <a href="{{ route('detallesUsuario', ['id' => $item->id]) }}"
                                                    title="Eliminar"
                                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="card-footer">
                            {{ $datos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
