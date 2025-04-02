<x-layouts.app :title="__('Dashboard')">
  <div class="container">
    <h1>Ofertas de Empleo</h1>
    <a href="{{ route('offers.create') }}" class="btn btn-primary">Crear Oferta</a>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Título</th>
                <th>Empresa</th>
                <th>Ubicación</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->enterprise_name }}</td>
                    <td>{{ $offer->location }}</td>
                    <td>{{ $offer->salary }}</td>
                    <td>
                      <a href="{{ route('offers.show', $offer) }}" class="btn btn-info">Ver</a>
                  
                      @can('edit offers')
                          <a href="{{ route('offers.edit', $offer) }}" class="btn btn-warning">Editar</a>
                      @endcan
                  
                      @can('delete offers')
                          <form action="{{ route('offers.destroy', $offer) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                          </form>
                      @endcan
                  </td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $offers->links() }}
  </div>
</x-layouts.app>
