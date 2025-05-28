<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="font-quicksand">
    <x-header />
    {{-- Contactpagina Hero --}}
    <section class="bg-blue-300 text-white py-36 px-6">
        <div class="max-w-2xl mx-auto text-center items-center space-y-6">
            <h1 class="text-5xl font-bold font-quicksand">Contacteer ons</h1>
            <p class="text-lg">Heb je vragen of wil je iets melden buiten het formulier? Neem gerust contact met ons op.</p>
        </div>
    </section>

    {{-- Contact Info --}}
    <section class="flex py-16 px-6 max-w-5xl mx-auto space-x-16">
        <div class="text-lg space-y-4">
            <h2 class="text-2xl font-semibold">Onze gegevens</h2>
            <p>Email: <a href="mailto:info@spotmyalien.be" class="text-blue-600 hover:underline">info@spotmyalien.be</a></p>
            <p>Telefoon: +32 123 45 67 89</p>
            <p>Adres: UFO-straat 1, 4000 Genk, België</p>
        </div>

        {{-- Google Maps Embed --}}
        <div class="w-full h-96 rounded-xl overflow-hidden shadow-lg border border-gray-200">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2511.060385014267!2d5.533022476471102!3d50.99655627170157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0d8d1f956f48f%3A0x6640c0b876d409f2!2sSyntraPXL%20Campus%20Genk!5e0!3m2!1sen!2sbe!4v1748421897517!5m2!1sen!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </iframe>
        </div>
    </section>
    <x-footer />
</body>

</html>