@extends('layouts.app')

@section('content')
   {{-- {{ $conversation }} --}}
   @livewire('conversation', ['conversation' => $conversation])
@endsection