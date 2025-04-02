<x-layouts.app :title="__('Dashboard')">
    <div class="container">
        <h1>{{ $offer->title }}</h1>
        <p><strong>Empresa:</strong> {{ $offer->enterprise_name }}</p>
        <p><strong>Ubicación:</strong> {{ $offer->location }}</p>
        <p><strong>Salario:</strong> {{ $offer->salary }}</p>
        <p><strong>Descripción:</strong> {{ $offer->description }}</p>
        
        <a href="{{ route('offers.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('offers.edit', $offer) }}" class="btn btn-warning">Editar</a>
        
        <form action="{{ route('offers.destroy', $offer) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</x-layouts.app>