<header class="flex justify-between items-center px-6 py-4 shadow">
    <div class="font-bold text-lg w-[50px]">
        <a href="{{ route('home') }}"><img src="{{ asset('images/alien-space.svg') }}" alt="{{ $logoAlt }}"></a>
    </div>
    <nav class="space-x-4">
        <a href="{{ route('login') }}" class="text-sm hover:underline">login</a>
        <a href="{{ route('register') }}" class="text-sm hover:underline">register</a>
        <a href="{{ route('about') }}" class="text-sm hover:underline">Over ons</a>
        <a href="{{ route('contact') }}" class="text-sm hover:underline">Contact</a>
        @auth
        <a href="#" class="text-sm hover:underline">Mijn Meldingen</a>
           <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-sm hover:underline bg-transparent border-none cursor-pointer">
            Log out
        </button>
    </form>
        @endauth

    </nav>
</header>