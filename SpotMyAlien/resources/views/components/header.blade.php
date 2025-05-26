<header class="flex justify-between items-center px-6 py-4 shadow">
    <div class="font-bold text-lg w-[50px]">
        <img src="{{ asset('images/alien-space.svg') }}" alt="{{ $logoAlt }}">
    </div>
    <nav class="space-x-4">
        <a href="#" class="text-sm hover:underline">login</a>
        <a href="#" class="text-sm hover:underline">register</a>
        <a href="{{ route('contact') }}" class="text-sm hover:underline">contact</a>
    </nav>
</header>