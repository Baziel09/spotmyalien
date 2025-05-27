<header class="flex justify-between items-center px-6 py-4 shadow">
    <div class="font-bold text-lg w-[50px]">
        <a href="{{ route('home') }}"><img src="{{ asset('images/alien-space.svg') }}" alt="{{ $logoAlt }}"></a>
    </div>
    <nav class="space-x-4">
        <a href="#" class="text-sm hover:underline">Login</a>
        <a href="#" class="text-sm hover:underline">Register</a>
        <a href="{{ route('about') }}" class="text-sm hover:underline">Over ons</a>
        <a href="{{ route('contact') }}" class="text-sm hover:underline">Contact</a>
        @auth
        <a href="#" class="text-sm hover:underline">Mijn Meldingen</a>
        @endauth
    </nav>
</header>