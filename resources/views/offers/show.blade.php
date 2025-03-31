<x-layouts.app :title="__('Dashboard')">
<h2 class="font-bold text-lg">{{ $offer->title }}</h2>

    <p>
        This offer is located in {{ $offer->description }}.
    </p> 
    <p>
        This offer pays {{ $offer->salary }} per year.
    </p>
    <p>
        This offer is located in {{ $offer->location }}.
    </p> 
</x-layouts.app>