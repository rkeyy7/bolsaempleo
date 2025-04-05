<x-layouts.app :title="__('Applications for Offer')">
    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Control de Postulaciones</h1>

        {{-- Mostrar mensajes flash --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if($applications->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 px-6 py-4 rounded-lg">
                No hay postulaciones para esta oferta.
            </div>
        @else
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gradient-to-r from-blue-100 to-blue-200 border-b">
                        <tr>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-blue-800"> Postulante</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-blue-800"> Estado</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-blue-800"> Actualizar</th>
                            <th class="text-left px-6 py-3 text-sm font-semibold text-blue-800"> Documento</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($applications as $application)
                            <tr class="hover:bg-blue-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $application->user->name }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold 
                                        {{
                                            $application->status == 'accepted' ? 'bg-green-100 text-green-700' :
                                            ($application->status == 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700')
                                        }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <form action="{{ route('applications.updatestatus', $application->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="border border-gray-300 rounded px-2 py-1 text-sm">
                                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Aceptada</option>
                                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rechazada</option>
                                        </select>
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs shadow-md">Actualizar</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('files.download', $application->file_id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs shadow-md">Descargar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6">
            {{ $applications->links() }}
        </div>
    </div>
</x-layouts.app>