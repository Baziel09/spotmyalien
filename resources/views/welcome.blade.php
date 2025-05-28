{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>SpotMyAlien</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-white text-gray-900 font-quicksand">

    {{-- Header Component--}}
    <x-header />

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-blue-300 to-blue-500 text-white py-24 px-6 relative overflow-hidden">
        <div class="relative max-w-7xl mx-auto md:flex items-center justify-between">
            <div class="md:w-1/2 space-y-6">
                <div class="inline-block px-4 py-2 bg-green-500 bg-opacity-20 rounded-full text-white text-sm font-medium">
                    🛸 UFO Meldpunt voor Vlaanderen
                </div>
                <h1 class="text-6xl md:text-7xl font-bold font-quicksand">
                    SpotMyAlien
                </h1>
                <p class="text-xl text-blue-100 font-medium tracking-wide">
                    Verzamelen. Documenteren. Begrijpen.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="report" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:from-green-400 hover:to-emerald-500">
                        Maak melding
                    </a>
                    <a href="#" class="inline-flex items-center justify-center border-2 border-white border-opacity-30 text-white px-8 py-4 rounded-xl font-semibold transform hover:scale-105 duration-300">
                        Bekijk meldingen
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center relative">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-600 rounded-2xl blur-2xl opacity-30 scale-110"></div>
                    <img src="{{ asset('images/header-photo.jpg') }}" alt="UFO" class="relative rounded-2xl max-w-sm shadow-2xl transform hover:scale-105 transition-transform duration-500 border border-white border-opacity-20">
                </div>
            </div>
        </div>
    </section>

    {{-- Laatste meldingen --}}
    <section class="bg-blue-400">
        <h2 class="text-3xl pt-12 font-bold mb-4 text-white text-center">Laatste meldingen</h2>

        @if ($reports->isEmpty())
        <p class="text-white text-center">Nog geen meldingen om te tonen. <br> Help ons op weg door een melding te making!</p>
        @else

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-18">
            @foreach($reports as $report)
            <div class="group bg-gradient-to-r from-blue-300 to-blue-350 p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">

                <!-- Location badge -->
                <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium mb-4">
                    <span class="mr-1">📍</span>
                    {{ $report->city }}, {{ $report->country }}
                </div>

                <!-- Type and date -->
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">
                        {{ $report->type }}
                    </span>
                    <span class="text-white text-sm">{{ $report->date }}</span>
                </div>

                <!-- Description -->
                <p class="text-white leading-relaxed mb-4">
                    {{ Str::limit($report->description, 120) }}
                </p>

                <!-- Read more link -->
                <div class="flex items-center text-white hover:text-blue-800 font-medium text-sm group-hover:translate-x-1 transition-transform duration-300">
                    <span>Lees meer</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>
    {{-- Waarom SpotMyAlien --}}
    <section class="bg-blue-400 text-white py-16 px-6">
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Waarom SpotMyAlien</h2>
            <p class="text-gray-300">
            UFO-waarnemingen verdienen een serieuze aanpak. SpotMyAlien biedt een platform waar nieuwsgierigheid, onderzoek en transparantie samenkomen.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-6 max-w-7xl mx-auto">
            <div class="group bg-gradient-to-r from-blue-300 to-blue-350 p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                <h3 class="text-xl font-bold mb-2">Informatie</h3>
                <p>
                    Lees betrouwbare artikelen, analyses en getuigenverslagen over UFO-fenomenen. We scheiden feit van fictie.
                </p>
            </div>
            <div class="group bg-gradient-to-r from-blue-300 to-blue-350 p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                <h3 class="text-xl font-bold mb-2">Meldpunt</h3>
                <p>
                    Documenteer waarnemingen in Vlaanderen. Vul een formulier in en upload beeldmateriaal.
                </p>
            </div>
            <div class="group bg-gradient-to-r from-blue-300 to-blue-350 p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                <h3 class="text-xl font-bold mb-2">Data Analyseren</h3>
                <p>
                    Binnenkomende meldingen worden verwerkt in een openbaar overzicht: kaarten, tijdlijnen en trends.
                </p>
            </div>
        </div>
    </section>


    {{-- Donatie Sectie --}}
    <section class="bg-white py-20 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-500 mb-4">Steun het UFO Meldpunt</h2>
            <p class="text-gray-700 mb-8">
                SpotMyAlien wordt vrijwillig onderhouden. Help ons door een kleine donatie te doen. Elk bedrag helpt ons om meldingen te verzamelen en analyseren.
            </p>

            <form action="{{ route('donate.checkout') }}" method="POST" class="space-y-4 max-w-md mx-auto">
                @csrf
                <label for="amount" class="block text-left font-medium text-gray-700">Kies je bedrag (€):</label>
                <input
                    type="number"
                    name="amount"
                    id="amount"
                    min="1"
                    required
                    placeholder="Bijvoorbeeld: 10"
                    class="w-full px-4 py-2 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button
                    type="submit"
                    class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">
                    Doneer via Stripe
                </button>
            </form>
        </div>
    </section>

    {{-- Footer Component --}}
    <x-footer />
@livewireScripts
</body>

</html>