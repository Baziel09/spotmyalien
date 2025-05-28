<div class="min-h-screen bg-blue-400">
    {{-- Flash Messages --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mx-6" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="container mx-auto px-6 py-8">
        {{-- Header --}}
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-white mb-2 font-quicksand">Mijn Meldingen</h1>
            <p class="text-blue-100">Bekijk en beheer je UFO waarnemingen</p>
        </div>

        {{-- Filters en Zoeken --}}
        <div class="bg-gradient-to-r from-blue-300 to-blue-350 rounded-2xl shadow-lg p-6 mb-8 border border-white border-opacity-20">
            <div class="flex flex-col md:flex-row gap-4">
                {{-- Zoekbalk --}}
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-white mb-2">Zoeken</label>
                    <input 
                        wire:model.live.debounce.300ms="search"
                        type="text" 
                        id="search"
                        placeholder="Zoek in beschrijving, stad of type..."
                        class="w-full px-4 py-2 border border-white border-opacity-30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-white focus:border-white bg-white bg-opacity-10 text-gray-800 placeholder-blue-100"
                    >
                </div>

                {{-- Type Filter --}}
                <div class="md:w-48">
                    <label for="filterType" class="block text-sm font-medium text-white mb-2">Type</label>
                    <select 
                        wire:model.live="filterType"
                        id="filterType"
                        class="w-full px-4 py-2 border border-white border-opacity-30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-white focus:border-white bg-white bg-opacity-10 text-gray-800"
                    >
                        <option value="" class="text-gray-800">Alle types</option>
                        @foreach($reportTypes as $type)
                            <option value="{{ $type }}" class="text-gray-800">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sorteren --}}
                <div class="md:w-48">
                    <label for="sortBy" class="block text-sm font-medium text-white mb-2">Sorteren op</label>
                    <select 
                        wire:model.live="sortBy"
                        id="sortBy"
                        class="w-full px-4 py-2 border border-white border-opacity-30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-white focus:border-white bg-white bg-opacity-10 text-gray-800"
                    >
                        <option value="created_at" class="text-gray-800">Datum toegevoegd</option>
                        <option value="date" class="text-gray-800">Waarnemingsdatum</option>
                        <option value="city" class="text-gray-800">Stad</option>
                        <option value="type" class="text-gray-800">Type</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Meldingen Grid --}}
        @if($reports->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($reports as $report)
                    <div class="group bg-gradient-to-r from-blue-300 to-blue-350 rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-white border-opacity-20 transform transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                        
                        {{-- Foto als beschikbaar --}}
                        @if($report->photo_path)
                            <div class="mb-4 -mx-6 -mt-6">
                                <img 
                                    src="{{ Storage::disk('public')->url($report->photo_path) }}" 
                                    alt="UFO waarneming foto"
                                    class="w-full h-48 object-cover rounded-t-2xl"
                                >
                            </div>
                        @endif

                        {{-- Status Badge (validated) --}}
                        <div class="flex items-center justify-between mb-2">
                            <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                                <span class="mr-1">📍</span>
                                {{ $report->city }}, {{ $report->country }}
                            </div>
                            
                            @if($report->validated)
                                <div class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                    <span class="mr-1">✓</span>
                                    Geverifieerd
                                </div>
                            @else
                                <div class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                                    <span class="mr-1">⏳</span>
                                    In behandeling
                                </div>
                            @endif
                        </div>

                        {{-- Straat als beschikbaar --}}
                        @if($report->street)
                            <p class="text-blue-100 text-sm mb-4">{{ $report->street }}</p>
                        @endif

                        {{-- Type en Datum --}}
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">
                                {{ $report->type }}
                            </span>
                            <span class="text-white text-sm">{{ \Carbon\Carbon::parse($report->date)->format('d/m/Y') }}</span>
                        </div>

                        {{-- Beschrijving --}}
                        <p class="text-white leading-relaxed mb-4">
                            {{ Str::limit($report->description, 120) }}
                        </p>

                        {{-- Acties --}}
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                {{-- Datum toegevoegd --}}
                                <p class="text-xs text-blue-100">
                                    Toegevoegd: {{ $report->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            
                            <div class="flex gap-2">
                                {{-- Bewerk knop --}}
                                {{-- <button class="p-2 text-blue-100 hover:text-white transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                 --}}
                                {{-- Verwijder knop --}}
                                <button 
                                    wire:click="deleteReport({{ $report->id }})"
                                    wire:confirm="Weet je zeker dat je deze melding wilt verwijderen?"
                                    class="p-2 text-blue-100 hover:text-red-300 transition-colors duration-200"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginatie --}}
            <div class="flex justify-center">
                {{ $reports->links() }}
            </div>
        @else
            {{-- Geen meldingen --}}
            <div class="text-center py-16">
                <h3 class="text-xl font-semibold text-white mb-2">Geen meldingen gevonden</h3>
                <p class="text-blue-100 mb-6">
                    @if($search || $filterType)
                        Probeer je zoekfilters aan te passen.
                    @else
                        Je hebt nog geen UFO meldingen ingediend.
                    @endif
                </p>
                <a href="{{ route('report') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    Maak je eerste melding
                </a>
            </div>
        @endif
    </div>
</div>