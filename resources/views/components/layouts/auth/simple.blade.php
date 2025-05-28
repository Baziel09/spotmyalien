<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        @livewireStyles
    </head>
    <body class="min-h-screen bg-gradient-to-br from-blue-300 via-blue-400 to-blue-500 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-6">
                {{-- Remove the logo below if you don't want it on auth pages --}}
                {{-- 
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                --}}
                {{ $slot }}
            </div>
        </div>
        @fluxScripts
        @livewireScripts
        <script>
            document.querySelector('form').addEventListener('submit', (e) => {
                console.log('Form submitted normally - THIS SHOULD NOT HAPPEN');
            });
        </script>
    </body>
</html>
