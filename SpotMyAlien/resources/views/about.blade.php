<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-header />
    {{-- Over ons Hero --}}
    <section class="bg-blue-300 text-white py-36 px-6 flex items-center justify-center text-center">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-5xl font-bold font-quicksand">Over SpotMyAlien</h1>
        <p class="text-lg">
            Wij geloven dat elke waarneming telt. SpotMyAlien is hét Vlaamse platform voor het registreren, analyseren en delen van UFO-waarnemingen.
        </p>
    </div>
    </section>

    {{-- Missie / Visie --}}
    <section class="bg-blue-400 text-white py-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Onze Missie</h2>
            <p class="text-gray-200 mb-10">
                SpotMyAlien wil bijdragen aan een beter begrip van onverklaarbare luchtfenomenen. Door gegevens te verzamelen van burgers, en deze gestructureerd te analyseren, bouwen we samen aan een transparante databank.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-green-500 hover:bg-green-300  p-6 rounded-xl shadow transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Burgerwetenschap</h3>
                    <p>
                        Iedereen kan bijdragen. Geen witte jassen nodig — alleen een scherpe blik en een open geest.
                    </p>
                </div>
                <div class="bg-green-500 hover:bg-green-300 p-6 rounded-xl shadow transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Objectieve Analyse</h3>
                    <p>
                        We gebruiken moderne analysetools om patronen te herkennen en hoaxes te onderscheiden van relevante meldingen.
                    </p>
                </div>
                <div class="bg-green-500 hover:bg-green-300  p-6 rounded-xl shadow transform transition duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold mb-2">Open Kennis</h3>
                    <p>
                        Alle verzamelde gegevens worden vrij beschikbaar gesteld in onze publieke database. Samen weten we meer.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team --}}
    <section class="bg-blue-400 text-white py-16 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Wie zit er achter SpotMyAlien?</h2>
            <p class="text-white-300">
                Een groep vrijwilligers, wetenschapsliefhebbers en nuchtere dromers met één gemeenschappelijk doel: duidelijkheid scheppen in het onbekende.
            </p>
        </div>
    </section>
    <x-footer />
</body>
</html>