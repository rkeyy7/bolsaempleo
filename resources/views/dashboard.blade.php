<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6 p-4">
        @foreach ($offers as $offer)
            <a href="/offers/{{ $offer['id'] }}" 
               class="block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-blue-600 text-sm">{{ $offer->user->name }}</span>
                    <span class="text-gray-400 text-xs">{{ $offer['created_at']->diffForHumans() }}</span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ $offer['title'] }}</h3>
                
                <p class="text-gray-600 text-sm mt-2">{{ $offer['description'] }}</p>
                
                <div class="mt-4 flex flex-wrap items-center gap-2 text-sm">
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full font-medium">{{ $offer['location'] }}</span>
                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full font-medium">Pays: {{ $offer['salary'] }} per year</span>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $offers->links() }}
    </div>
</x-layouts.app>