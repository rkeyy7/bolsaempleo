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
        
        @if(auth()->user()->hasRole('user'))
            <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <label for="file">Subir Hoja de Vida:</label>
                <input type="file" name="file" id="file" required>
                <button type="submit">Subir</button>
            </form>
        @endif

        @if(auth()->user()->file)
            <form action="{{ route('applications.apply', $offer->id) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit">Postularse</button>
            </form>
@endif
        
    </div>
</x-layouts.app>