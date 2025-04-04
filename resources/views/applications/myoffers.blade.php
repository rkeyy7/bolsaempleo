<x-layouts.app :title="__('Dashboard')">
    <div class="container">
       
        <div>
            <h1>Mis Trabajos</h1>
       
            @if($myoffers->isEmpty())
                <p>No tienes trabajos publicados.</p>
            @else
                <div class="block px-4 py-6 border border-gray-200 rounded-lg mb-4">
                    @foreach($myoffers as $myoffer)
                    <div class="font-bold text-blue-500 text-sm">{{ $myoffer->user->name }}</div>
                        
                        <div>
                            <strong class="text-laracasts">{{ $myoffer->title }}:</strong>
                        </div>
                        <a href="{{ route('applications.offerapplications', $myoffer->id) }}" class="px-4 py-2 bg-amber-500 text-blue-600 rounded-lg text-sm hover:bg-blue-100 transition">ver postulantes</a>
                            
                        <a href="{{ route('offers.edit', $myoffer) }}" 
                            class="px-4 py-2 bg-blue-300 text-blue-600 rounded-lg text-sm hover:bg-blue-100 transition">Editar</a>
                            
                        <form action="{{ route('offers.destroy', $myoffer) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition">
                                Eliminar
                            </button>
                        </form>

                    </div>
                    @endforeach

                @endif
        </div>

    </div>

    {{ $myoffers->links() }}
</x-layouts.app>