{{-- filepath: c:\xampp\htdocs\laravel\bolsaempleo\resources\views\applications\offerapplications.blade.php --}}
<x-layouts.app :title="__('Applications for Offer')">
    <div class="container">
        <h1>Postulaciones para la Oferta</h1>
        @if($applications->isEmpty())
            <p>No hay postulaciones para esta oferta.</p>
        @else
            <ul>
                @foreach($applications as $application)
                <div class="block px-4 py-6 border border-gray-200 rounded-lg mb-4">
                    <div class="font-bold text-blue-500 text-sm">{{ $application->user->name }}</div>
                    
                    <div>
                        <strong class="text-laracasts">Estado:</strong> {{ $application->status }}
                    </div>

                    <div class="mt-2">
                        Form to change the status of the application
                        <form action="{{ route('applications.updatestatus', $application->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="border border-gray-300 rounded px-2 py-1">
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Aceptada</option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rechazada</option>
                            </select>
                            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Actualizar</button>
                        </form>

                        Link to download the associated document
                        <a href="{{ route('files.download', $application->file_id) }}" class="ml-4 px-4 py-2 bg-green-500 text-white rounded">Descargar Documento</a>
                    </div>
                </div>
                @endforeach
            </ul>
        @endif
    </div>

    {{ $applications->links() }}
</x-layouts.app>