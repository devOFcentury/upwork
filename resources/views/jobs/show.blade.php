@extends('layouts.app')

@section('content')
     <h1 class="text-3xl text-green-500 mb-3">{{ $job->title }}</h1>
     <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
          <h2 class="text-xl font-bold text-green-800">{{ $job->title }}</h2>
          <p class="text-md text-gray-800">{{ $job->description }}</p>
          <span class="text-sm text-gray">{{ number_format($job->price / 100, 2, ',', ' ') }}€</span>
     </div>

     <section x-data="{open: false}">
          <a href="#" class="text-green-500" @click="open=!open">Cliquez ici pour soumettre une candidature</a>
          <form method="post" x-show="open" action="{{ route('proposals.store', $job) }}">
               @csrf
               <textarea name="content" class="p-3 font-thin w-full max-w-md" ></textarea>
               <button type="submit" class="block bg-green-700 text-white px-3 py-2 mt-3">Soumettre ma lettre de motivation</button>
          </form>
     </section>
@endsection