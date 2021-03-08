<x-app-layout>
    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-200 text-gray-700 text-lg px-6 py-4 flex justify-center">
                    <span> Mis mensajes </span>
                </div>
                <table class="min-w-max w-full table-auto items-center px-6 py-4">
                    <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Usuario</th>
                            <th class="py-3 px-6 text-center">Sin leer</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-medium">

                        @foreach ($datos as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <span>{{ $item->nick }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($sinleer = $item->sent_messages
        ->where('to_user_id', Auth::user()->id)
        ->where('read', false)
        ->count())
                                        <span
                                            class="bg-green-200 text-green-700 px-2 py-1 rounded-full text-xs">{{ $sinleer }}</span>

                                    @endif
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('conversacion', ['id' => $item->id]) }}"
                                            title="Ver conversacion"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="far fa-comments"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-gray-200 px-6 py-4">
                    {{-- {{ $datos->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
