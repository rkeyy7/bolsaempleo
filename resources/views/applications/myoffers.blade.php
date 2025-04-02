<x-layouts.app :title="__('Dashboard')">
    <div class="container">
        <h1>Mis Trabajos</h1>
        @if($offers->isEmpty())
            <p>No tienes trabajos publicados.</p>
        @else
            <ul>
                @foreach($offers as $offer)
                <a href="{{ route('applications.job_applications', $offer->id) }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{ $offer->user->name }}</div>
    
                    <div>
                        <strong class="text-laracasts">{{ $offer->title }}:</strong>
                    </div>
                </a>
                @endforeach
            </ul>
        @endif
    </div>

    {{ $applications->links() }}
</x-layouts.app>