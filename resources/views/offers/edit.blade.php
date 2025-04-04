<x-layouts.app :title="__('Dashboard')">
    <div class="container">
        <h1>Editar Oferta</h1>
        
        <form action="{{ route('offers.update', $offer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="enterprise_name" class="form-label">Nombre de la Empresa</label>
                <input type="text" class="form-control" name="enterprise_name" value="{{ $offer->enterprise_name }}" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" name="title" value="{{ $offer->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" name="description" required>{{ $offer->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salario</label>
                <input type="text" class="form-control" name="salary" value="{{ $offer->salary }}" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Ubicación</label>
                <input type="text" class="form-control" name="location" value="{{ $offer->location }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</x-layouts.app>