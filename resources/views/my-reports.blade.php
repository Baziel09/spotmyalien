<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Mijn Meldingen - SpotMyAlien</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="text-gray-900 font-quicksand min-h-screen">
    {{-- Header Component --}}
    <x-header />

    {{-- Main Content --}}
    @livewire('my-reports')

    {{-- Footer Component --}}
    <x-footer />

    @livewireScripts
</body>

</html>