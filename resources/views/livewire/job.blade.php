<div>
    <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold text-green-800">{{ $job->title }}</h2>
            <button class="h-5 w-5 text-gray-600 focus:outline-none" wire:click="addLike">
                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isliked() ? 'green' : 'white' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>

              
        </div>
        <p class="text-md text-gray-800">{{ $job->description }}</p>
        <div class="flex items-center">
             <span class="h-2 w-2 bg-green-300 rounded-full mr-1"></span>
             <a href="{{ route('jobs.show', ['id' => $job->id]) }}">Consulter la mission</a>
        </div>
        <span class="text-sm text-gray">{{ number_format($job->price / 100, 2, ',', ' ') }}€</span>
    </div>
</div>
