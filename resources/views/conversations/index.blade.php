@extends('layouts.app')

@section('content')
  <h1 class="text-3xl text-green-500 mb-5">Vos conversations</h2>
  @foreach($conversations as $conversation)
  <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
    {{-- si la conversation actuelle a un message correspondant on l'affiche --}}
    @if (!is_null(optional($conversation->messages->last())->id))
    <div class="flex items-center justify-between px-3 py-10 mb-3 shadow-md rounded mb-3 border-2 hover:border-green-300 cursor-pointer">
      <p class="font-semibold">{{ Illuminate\Support\Str::limit(optional($conversation->messages->last())->content, 50) }}
      </p>
      
      <p class="font-thin text-gray-500">
        envoyé par 
        <strong>
          {{ 
            auth()->user()->id === optional(optional($conversation->messages->last())->user)->id ? 
            'vous' 
            : 
            optional(optional($conversation->messages->last())->user)->name }}
        </strong> 
        {{ optional(optional($conversation->messages->last())->created_at)->diffForHumans() }}
      </p>
    </div>
    @endif
  </a>
  @endforeach
@endsection