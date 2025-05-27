@vite('resources/css/app.css')

<div class="min-h-screen bg-gradient-to-br from-blue-300 via-blue-400 to-blue-500 flex items-center justify-center p-6">
    <div class="w-full max-w-sm bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8">
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/alien-space.svg') }}" alt="Logo" class="w-16 h-16">
        </div>
        <h2 class="text-3xl font-quicksand font-bold text-center text-blue-500 mb-2">
            {{ __('Forgot password') }}
        </h2>
        <p class="text-center text-blue-400 font-quicksand mb-8">
            {{ __('Enter your email to receive a password reset link') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form wire:submit="sendPasswordResetLink" class="space-y-6">
            <!-- Email Address -->
            <div>
                <label for="email" class="block font-quicksand text-blue-400 mb-2">{{ __('Email Address') }}</label>
                <input wire:model="email"
                    type="email"
                    id="email"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-300/20 transition-colors bg-white/50 text-gray-700"
                    required
                    autofocus
                    placeholder="email@example.com">
                @error('email')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-green-300 hover:bg-green-500 text-white font-quicksand font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                    {{ __('Email password reset link') }}
                </button>
            </div>
        </form>

        <div class="text-center mt-6 text-sm text-blue-400 font-quicksand">
            {{ __('Or, return to') }}
            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-500 font-quicksand ml-1">
                {{ __('log in') }}
            </a>
        </div>
    </div>
</div>
