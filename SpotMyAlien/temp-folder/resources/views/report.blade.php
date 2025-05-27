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
<body class="bg-gradient-to-br from-blue-50 to-green-50 dark:from-dark-blue-dark dark:to-dark-green-dark min-h-screen flex items-center justify-center p-4 transition-colors duration-300">
    <div class="w-full max-w-lg">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green to-blue rounded-full mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-dark-blue dark:text-white mb-2">Report Sighting</h1>
            <p class="text-blue dark:text-blue-dark">Share your observation with our community</p>
        </div>
        
        <!-- Form Container -->
        <div class="bg-white dark:bg-black rounded-2xl shadow-2xl p-8 border border-green/20 dark:border-green-dark/20">
            <livewire:report-form />
        </div>
        
        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-sm text-blue/70 dark:text-blue-dark/70">Your reports help build a better community</p>
        </div>
    </div>
    @livewireScripts
</body>
</html>