{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
    <title>SpotMyAlien</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900 font-quicksand">

    {{-- Header Component--}}
    <x-header />

    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-300 to-blue-500 text-white py-36 px-24 md:flex items-center justify-between">
        <div class="md:w-1/2 space-y-4">
            <h1 class="text-5xl font-bold font-quicksand">SpotMyAlien</h1>
            <p class="underline">
               Verzamelen. Documenteren. Begrijpen. 
            </p>
            <a href="#" class="inline-block bg-green-300 text-white px-6 py-2 mt-6 rounded hover:bg-green-500">
                Maak melding
            </a>
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0 flex justify-center">
            <img src="{{ asset('images/header-photo.jpg') }}" alt="UFO" class="rounded-xl max-w-sm shadow-lg transform scale-130">
        </div>
    </section>

    {{-- Laatste meldingen --}}
    <section class="bg-blue-400">
    <h2 class="text-3xl pt-12 font-bold mb-4 text-white text-center">Laatste meldingen</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto max-w-4xl">
        @foreach($reports as $report)
            <div class="bg-green-500 hover:bg-green-300 p-6 pt-12 pb-12 text-white rounded-xl shadow text-left transform transition duration-300 hover:scale-105">
                <strong>{{ $report->city }}, {{ $report->country }}</strong><br>
                {{ $report->type }} op {{ $report->date }}<br>
                {{ Str::limit($report->description, 100) }}
            </div>
        @endforeach
    </div>
</section>
    {{-- Waarom SpotMyAlien --}}
    <section class="bg-blue-400 text-white py-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Waarom SpotMyAlien</h2>
            <p class="text-gray-300 mb-10">
                “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-green-500 hover:bg-green-300 p-6 rounded-xl shadow text-left transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Informatie</h3>
                    <p>
                        Lees betrouwbare artikelen, analyses en getuigenverslagen over UFO-fenomenen. We scheiden feit van fictie.
                    </p>
                </div>
                <div class="bg-green-500 hover:bg-green-300 p-6 rounded-xl shadow text-left transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Meldpunt</h3>
                    <p>
                        Documenteer waarnemingen in Vlaanderen. Vul een formulier in en upload beeldmateriaal.
                    </p>
                </div>
                <div class="bg-green-500 hover:bg-green-300 p-6 rounded-xl shadow text-left transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Data Analyseren</h3>
                    <p>
                        Binnenkomende meldingen worden verwerkt in een openbaar overzicht: kaarten, tijdlijnen en trends.
                    </p>
                </div>
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
                    class="w-full px-4 py-2 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-300"
                >
                <button
                    type="submit"
                    class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition"
                >
                    Doneer via Stripe
                </button>
            </form>
        </div>
    </section>

    {{-- Footer Component --}}
    <x-footer />

</body>
</html>