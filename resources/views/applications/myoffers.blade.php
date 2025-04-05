<x-layouts.app :title="__('MundoTrabajo')">
    <div class="max-w-6xl mx-auto py-10 px-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Control De Empleos</h1>

            @if ($myoffers->isEmpty())
                <p class="text-gray-500">No tienes trabajos publicados.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gradient-to-r from-blue-100 to-blue-200 border-b">
                            <tr>
                                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Empresa</th>
                                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Título</th>
                                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Postulantes</th>
                                <th class="text-left px-6 py-3 text-sm font-medium text-gray-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($myoffers as $myoffer)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-blue-600 font-semibold">{{ $myoffer->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $myoffer->title }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('applications.offerapplications', $myoffer->id) }}"
                                            class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-md text-xs font-medium transition">
                                            Ver Postulantes
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm space-x-2">
                                        <a href="{{ route('offers.edit', $myoffer) }}"
                                            class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1 rounded-md text-xs font-medium transition">
                                            Editar
                                        </a>
                                        <form action="{{ route('offers.destroy', $myoffer) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block bg-rose-500 hover:bg-rose-600 text-white px-3 py-1 rounded-md text-xs font-medium transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        <div class="mt-6">
            {{ $myoffers->links() }}
        </div>
    </div>
</x-layouts.app>
