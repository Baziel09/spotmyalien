@vite('resources/css/app.css')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-300 via-blue-400 to-blue-500 p-6">
    <div class="w-full max-w-sm bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8">
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/alien-space.svg') }}" alt="Logo" class="w-16 h-16">
        </div>
        <h2 class="text-3xl font-quicksand font-bold text-center text-blue-500 mb-8">Log in to your account</h2>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form wire:submit="login" class="space-y-6">
            <!-- Email Input -->
            <div>
                <label for="email" class="block font-quicksand text-blue-400 mb-2">Email</label>
                <input wire:model="email"
                       type="email"
                       id="email"
                       class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-300/20 transition-colors bg-white/50 text-gray-700"
                       required
                       autofocus>
                @error('email')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block font-quicksand text-blue-400 mb-2">Password</label>
                <input wire:model="password"
                       type="password"
                       id="password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-300/20 transition-colors bg-white/50 text-gray-700"
                       required>
                @error('password')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-400 hover:text-blue-500 font-quicksand float-right mt-2" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input wire:model="remember"
                       id="remember"
                       type="checkbox"
                       class="h-4 w-4 text-blue-500 focus:ring-blue-300 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-blue-400 font-quicksand">
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-green-300 hover:bg-green-500 text-white font-quicksand font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="text-center mt-6">
                <span class="text-sm text-blue-400 font-quicksand">
                    {{ __('Don\'t have an account?') }}
                </span>
                <a href="{{ route('register') }}" class="text-sm text-blue-400 hover:text-blue-500 font-quicksand ml-1">
                    {{ __('Sign up') }}
                </a>
            </div>
        @endif
    </div>
</div>