<x-layouts.app :title="__('Dashboard')">
    <div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-lg rounded-2xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Oferta</h1>
        
        <form action="{{ route('offers.update', $offer) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="enterprise_name" class="block text-gray-700 font-medium mb-2">Nombre de la Empresa</label>
                <input type="text" id="enterprise_name" name="enterprise_name" value="{{ $offer->enterprise_name }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-2">Título</label>
                <input type="text" id="title" name="title" value="{{ $offer->title }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Descripción</label>
                <textarea id="description" name="description" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $offer->description }}</textarea>
            </div>
            
            <div>
                <label for="salary" class="block text-gray-700 font-medium mb-2">Salario</label>
                <input type="text" id="salary" name="salary" value="{{ $offer->salary }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="location" class="block text-gray-700 font-medium mb-2">Ubicación</label>
                <input type="text" id="location" name="location" value="{{ $offer->location }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>