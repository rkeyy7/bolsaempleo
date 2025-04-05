<x-layouts.app :title="__('Dashboard')">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-gray-900">Crear una oferta de trabajo</h2>
        <p class="text-gray-600 text-sm">Solo necesitas proporcionar dos datos.</p>
        
        <form method="POST" action="/offers" class="mt-6 space-y-4">
            @csrf
            
            <div>
                <label for="enterprise_name" class="block text-sm font-medium text-gray-700">Nombre de la empresa</label>
                <input type="text" name="enterprise_name" id="enterprise_name" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Empresa S.A.S">
            </div>
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Título del trabajo">
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Descripción del puesto"></textarea>
            </div>
            
            <div>
                <label for="salary" class="block text-sm font-medium text-gray-700">Salario</label>
                <input type="number" name="salary" id="salary" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Salario en USD">
            </div>
            
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Ubicación</label>
                <input type="text" name="location" id="location" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Ubicación del trabajo">
            </div>
            
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-500 transition">Guardar</button>
            </div>
        </form>
    </div>
</x-layouts.app>