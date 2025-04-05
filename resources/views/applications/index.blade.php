<x-layouts.app :title="__('MundoTrabajo')">
    <div class="max-w-6xl mx-auto py-10 px-6 space-y-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Mis Postulaciones</h1>

        @if ($applications && $applications->count())
            @foreach ($applications as $application)
                <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition rounded-xl p-6 space-y-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-blue-600">{{ $application->offer->title }}</h2>
                        <span class="text-xs font-medium px-3 py-1 rounded-full
                            {{
                                $application->status == 'accepted' ? 'bg-green-100 text-green-700' :
                                ($application->status == 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700')
                            }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600">
                        Estado actual de la postulación: <span class="font-medium">{{ ucfirst($application->status) }}</span>
                    </p>
                </div>
            @endforeach
        @else
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-lg">
                <p>No tienes postulaciones aún.</p>
            </div>
        @endif

        <div class="mt-6">
            {{ $applications->links() }}
        </div>
    </div>
</x-layouts.app>
