<header class="flex justify-between align-items-center py-5">
     <div>logo</div>
     <nav>
          {{-- <livewire:search /> --}}
          @livewire('search')
          <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-green-500">Nos missions</a>
          @guest
               <a href="{{ route('login') }}" class="mr-5 hover:text-green-500">Se connecter</a>
               <a href="{{ route('register') }}" class="mr-5 hover:text-green-500">S'enregistrer</a>
          @else
               <a href="{{ route('conversations.index') }}" class="mr-5 hover:text-green-500">Mes conversations</a>
               <a href="{{ route('home') }}" class="mr-5 hover:text-green-500">Mon compte <span id="js-count">{{ auth()->user()->unreadNotifications->count() }}</span></a>
               <a href="{{ route('logout') }}" class="mr-5 hover:text-green-500" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Se déconnecter</a>
               <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none">@csrf</form>
          @endguest
     </nav>
</header>