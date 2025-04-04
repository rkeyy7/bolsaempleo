<x-layouts.app :title="__('Dashboard')">
  <div class="container">
    <h1>Crear Oferta</h1>
    
    <form action="{{ route('offers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="enterprise_name" class="form-label">Nombre de la Empresa</label>
            <input type="text" class="form-control" name="enterprise_name" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salario</label>
            <input type="text" class="form-control" name="salary" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <button type="submit" class="btn btn-success">Crear</button>
    </form>
  </div>
</x-layouts.app>