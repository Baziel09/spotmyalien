<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Sighting</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    {{-- Header Component--}}
    <x-header />

    <div class="bg-gradient-to-br from-blue-50 to-green-50 dark:from-blue-500 dark:to-green-500 min-h-screen flex items-center justify-center p-4 transition-colors duration-300">
    <div class="w-full max-w-lg">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-dark-blue dark:text-black mb-2">Report Sighting</h1>
            <p class="text-blue dark:text-blue-dark">Share your observation with our community</p>
        </div>
        
        <!-- Form Container -->
        <div class="bg-white dark:bg-black rounded-2xl shadow-2xl p-8 border border-green/20 dark:border-green-dark/20">
            <livewire:report-form />
        </div>
    </div>
    </div>

    {{-- Footer Component --}}
    <x-footer />
    @livewireScripts
</body>
</html>