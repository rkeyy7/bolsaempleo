<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6 p-6 max-w-4xl mx-auto">
        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-md space-y-4">
            <h1 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
                <svg class="w-1 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                </svg>
                {{ $offer->title }}
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                <p><span class="font-semibold text-gray-900"> Empresa:</span> {{ $offer->enterprise_name }}</p>
                <p><span class="font-semibold text-gray-900"> Ubicación:</span> {{ $offer->location }}</p>
                <p><span class="font-semibold text-gray-900"> Salario:</span> {{ $offer->salary }}</p>
                <p class="sm:col-span-2">
                    <span class="font-semibold text-gray-900"> Descripción:</span><br>
                    {{ $offer->description }}
                </p>
            </div>

            @if (auth()->user()->hasRole('user'))
                <div class="mt-6 border-t pt-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-800"> Documentos</h2>

                    {{-- Mostrar mensajes flash --}}
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-3">
                        @csrf
                        <label for="file" class="block text-sm font-medium text-gray-700">Subir Hoja de Vida</label>
                        <input type="file" name="file" id="file" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                            Subir Documento
                        </button>
                    </form>

                    <!-- Apply Button -->
                    @if (auth()->user()->file)
                        <form action="{{ route('applications.apply', $offer->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit"
                                class="px-5 py-2 bg-green-600 text-white rounded-lg text-sm font-semibold hover:bg-green-700 transition">
                                Postularme a esta oferta
                            </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>