<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-4">
        @foreach ($offers as $offer)
    
              <a href="/offers/{{ $offer['id'] }}" class="block px-4 py-6 border border-gray-200">
                <div class = "font-bold text-blue-500 text-sm">{{$offer->enterprise_name}}</div>
                <div>
                  <strong>{{ $offer['title'] }}:</strong> pays {{$offer['salary']}}
                </div>
              </a>
        @endforeach
      <div>
        {{$offers->links()}}
      </div>  
      </div>  
</x-layouts.app>
