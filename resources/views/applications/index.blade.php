<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-4">
        @if ($applications && $applications->count())
            @foreach ($applications as $application)
                <div class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{ $application->offer->title }}</div>
                    <div>
                        <strong class="text-laracasts">{{ $application['status'] }}:</strong>
                    </div>
                </div>
            @endforeach
        @else
            <p>No tienes postulaciones aún.</p>
        @endif
    </div>

    {{ $applications->links() }}
</x-layouts.app>