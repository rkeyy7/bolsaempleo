<x-layouts.app :title="__('Dashboard')">

    <div class="space-y-4">
        @foreach ($offers as $offer)
            <a href="/offers/{{ $offer['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $offer->user->name }}</div>

                <div>
                    <strong class="text-laracasts">{{ $offer['title'] }}:</strong> Pays {{ $offer['salary'] }} per year.
                </div>
            </a>
        @endforeach

>>>>>>> 9e2b84692924b97e84b1c65ca453d9c8ae00911e
    </div>

    {{ $offers->links() }}

</x-layouts.app>
