<div>
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-300/10 to-blue-300/10 dark:from-green-300-dark/10 dark:to-blue-300-dark/10 border border-green-300 dark:border-green-300-dark rounded-xl">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-300 dark:text-green-300-dark mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-green-300 dark:text-green-300-dark font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <!-- Date and Time Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Date Field -->
            <div class="space-y-2">
                <label for="date" class="block text-sm font-semibold text-blue-500 dark:text-white">
                    Datum
                    <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input 
                        type="date" 
                        wire:model="date" 
                        max="{{ now()->format('Y-m-d') }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                        id="date"
                        onclick="this.showPicker()"
                    >

                </div>
                @error('date')
                    <p class="text-red-500 text-sm flex items-center mt-1">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Time Field -->
            <div class="space-y-2">
                <label for="time" class="block text-sm font-semibold text-blue-500 dark:text-white">
                    Tijdstip
                    <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input 
                        type="time" 
                        wire:model="time" 
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                        id="time"
                        onclick="this.showPicker()"
                    >
                </div>
                @error('time')
                    <p class="text-red-500 text-sm flex items-center mt-1">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <!-- Type Field -->
        <div class="space-y-2">
            <label for="type" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Soort incident
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
            <select 
                wire:model="type"
                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white appearance-none"
                id="type"
            >
                <option value="">Selecteer het soort incident</option>
                @foreach($this->reportTypes as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            </div>
            @error('type') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Country Field -->
        <div class="space-y-2">
            <label for="country" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Land
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    wire:model="country" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                    id="country"
                    placeholder="In welk land vond dit plaats?"
                >
            </div>
            @error('country') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- City Field -->
        <div class="space-y-2">
            <label for="city" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Stad
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    wire:model="city" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                    id="city"
                    placeholder="In welke stad bevond je je?"
                >
            </div>
            @error('city') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Street Field -->
        <div class="space-y-2">
            <label for="street" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Straat en huisnummer
                <span class="text-gray-400 font-normal">(Optioneel)</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    wire:model="street" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                    id="street"
                    placeholder="In welke straat bevond je je?"
                >
            </div>
        </div>

        <!-- Description Field -->
        <div class="space-y-2">
            <label for="description" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Beschrijving
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <textarea 
                    wire:model="description" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border-0 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 resize-none" 
                    id="description" 
                    rows="4"
                    placeholder="Beschrijf de gebeurtenis en vermeld relevante details."
                ></textarea>
            </div>
            @error('description') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Photo Upload Field -->
        <div 
            class="space-y-2" 
            id="dropZone"
            ondragover="event.preventDefault(); this.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20')"
            ondragleave="event.preventDefault(); this.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20')"
            ondrop="
                event.preventDefault();
                this.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
                const file = event.dataTransfer.files[0];
                if (file) {
                    @this.upload('photo', file);
                }
            "
        >
            <label for="photo" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Fotografisch bewijs
                <span class="text-gray-400 font-normal">(Optioneel)</span>
            </label>
            
            <!-- Custom File Upload Area -->
            <div class="relative">
                <input 
                    type="file" 
                    wire:model="photo" 
                    class="sr-only" 
                    id="photo"
                    accept="image/*"
                >
                <label 
                    for="photo" 
                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200"
                >
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Klik om foto op te laden</span> of sleep naar hier
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX. 10MB)</p>
                    </div>
                </label>
            </div>

            @error('photo') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
            
            <!-- Upload Progress -->
            <div wire:loading wire:target="photo" class="flex items-center mt-2">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-300 dark:text-blue-300-dark" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-blue-300 dark:text-blue-300-dark font-medium">Foto wordt geladen...</span>
            </div>
            
            <!-- Photo Preview -->
            @if ($photo)
                <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            @if (method_exists($photo, 'temporaryUrl'))
                                <img src="{{ $photo->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg shadow-md" alt="Preview">
                            @endif                        
                            <div>
                                <p class="text-sm font-medium text-blue-500 dark:text-white">Foto is succesvol geladen</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Klaar om te verzenden</p>
                            </div>
                        </div>
                        <button 
                            type="button" 
                            wire:click="$set('photo', null)"
                            class="flex items-center justify-center w-8 h-8 text-red-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-full transition-colors duration-200"
                            title="Verwijder foto"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button 
                type="submit" 
                wire:loading.attr="disabled" 
                class="w-full bg-gradient-to-r from-green-300 to-blue-300 dark:from-green-300-dark dark:to-blue-300-dark hover:from-green-300/90 hover:to-blue/90 dark:hover:from-green-300-dark/90 dark:hover:to-blue-dark/90 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
            >
                <span wire:loading.remove class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Verzend melding
                </span>
                <span wire:loading class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Melding wordt verwerkt...
                </span>
            </button>
        </div>
    </form>
</div>