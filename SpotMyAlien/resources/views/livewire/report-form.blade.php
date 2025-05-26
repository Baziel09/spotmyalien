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

    <form wire:submit.prevent="submit" class="space-y-6">
        <!-- Name Field -->
        <div class="space-y-2">
            <label for="name" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Name
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    wire:model="name" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark focus:border-transparent transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                    id="name"
                    placeholder="Enter your name"
                >
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            @error('name') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Message Field -->
        <div class="space-y-2">
            <label for="message" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Sighting Details
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <textarea 
                    wire:model="message" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark focus:border-transparent transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 resize-none" 
                    id="message" 
                    rows="4"
                    placeholder="Describe what you observed, when it happened, and any other relevant details..."
                ></textarea>
                <div class="absolute top-3 right-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
            </div>
            @error('message') 
                <p class="text-red-500 text-sm flex items-center mt-1">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Location Field -->
        <div class="space-y-2">
            <label for="location" class="block text-sm font-semibold text-blue-500 dark:text-white">
                Location
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    wire:model="location" 
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-300-dark focus:border-transparent transition-all duration-200 text-blue-500 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" 
                    id="location"
                    placeholder="Where did this occur? (e.g., Central Park, NYC)"
                >
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
            @error('location') 
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
                Photo Evidence
                <span class="text-gray-400 font-normal">(Optional)</span>
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
                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Click to upload</span> or drag and drop
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
                <span class="text-blue-300 dark:text-blue-300-dark font-medium">Uploading image...</span>
            </div>
            
            <!-- Photo Preview -->
            @if ($photo)
                <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $photo->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg shadow-md" alt="Preview">
                        <div>
                            <p class="text-sm font-medium text-blue-500 dark:text-white">Image uploaded successfully</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Ready to submit</p>
                        </div>
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
                    Submit Report
                </span>
                <span wire:loading class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing Report...
                </span>
            </button>
        </div>
    </form>
</div>