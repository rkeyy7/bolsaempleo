<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6 p-4 max-w-3xl mx-auto">
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $offer->title }}</h1>
            
            <p class="text-gray-700 text-sm"><strong class="font-medium">Empresa:</strong> {{ $offer->enterprise_name }}</p>
            <p class="text-gray-700 text-sm"><strong class="font-medium">Ubicación:</strong> {{ $offer->location }}</p>
            <p class="text-gray-700 text-sm"><strong class="font-medium">Salario:</strong> {{ $offer->salary }}</p>
            <p class="text-gray-700 text-sm"><strong class="font-medium">Descripción:</strong> {{ $offer->description }}</p>

            <div class="mt-6 flex flex-wrap gap-3">
                @if(auth()->user()->hasRole('user'))
                <div class="mt-6">
                    <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                        @csrf
                        <label for="file" class="block text-sm font-medium text-gray-700">Subir Hoja de Vida:</label>
                        <input type="file" name="file" id="file" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition">
                            Subir
                        </button>
                    </form>
                </div>
                @endif

            @if(auth()->user()->file)
                <form action="{{ route('applications.apply', $offer->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" 
                            class="px-4 py-2 bg-green-500 text-white rounded-lg text-sm hover:bg-green-600 transition">
                        Postularse
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-layouts.app>