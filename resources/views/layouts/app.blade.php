<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upwork</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            [x-cloak] { display: none !important; }
        </style>
        @livewireStyles
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </head>
    <body>
      <div class="container mx-auto px-4 text-red-500">
          @include('partials.navbar')
          <livewire:flash />
          @yield('content')
      </div>
      @livewireScripts
      <script>
        // window.User = {
        //     id: {{ optional(auth()->user())->id }}
        // }
      </script>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>