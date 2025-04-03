<x-layouts.app :title="__('Dashboard')">
    <div class="container">
        <h1>Mis Trabajos</h1>
        @if($myoffers->isEmpty())
            <p>No tienes trabajos publicados.</p>
        @else
            <ul>
                @foreach($myoffers as $myoffer)
                <a href="{{ route('applications.offerapplications', $myoffer->id) }}" class="block px-4 py-6 border border-gray-200 rounded-lg">                    
                    <div class="font-bold text-blue-500 text-sm">{{ $myoffer->user->name }}</div>
                    
                    <div>
                        <strong class="text-laracasts">{{ $myoffer->title }}:</strong>
                    </div>
                </a>
                @endforeach
            </ul>
        @endif
    </div>

    {{ $myoffers->links() }}
</x-layouts.app>