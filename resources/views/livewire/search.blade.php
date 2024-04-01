<div class="inline-block relative" x-data ="{open: true}">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <input 
        type="text" 
        class="bg-gray-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 px-4 py-1 rounded-full mr-3 w-56" 
        placeholder="Rechercher une mission..." 
        wire:model="query"
        wire:keydown.arrow-down.prevent="incrementIndex"
        wire:keydown.arrow-up.prevent="decrementIndex"
        wire:keydown.backspace="resetIndex"
        wire:keydown.enter.prevent="showJob"
        @click.outside="open=false; $wire.resetIndex()"
        x-on:click="open=true"
    >
    <svg x-cloak class="w-5 h-5 text-gray-500 absolute top-0 right-0 mr-3 mt-2"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
    </svg>
    
    <div 
        class="absolute border rounded bg-gray-100 text-md w-56 mt-1"
        x-show="open"
        
    >
        @if (strlen($query) > 2)    
                @if (count($jobs) > 0)    
                    @foreach ($jobs as $index => $job)
                    <p class="p-1 {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{ $job->title }}</p>
                    @endforeach
                @else
                    <span class="text-orange-500 p-1">0 Résultat pour {{ $query }}</span>
                @endif
        @endif
    </div>
    
</div>

