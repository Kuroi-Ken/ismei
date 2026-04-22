<x-guest-layout title="Register">
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 border border-blue-50">
            
            {{-- Header Logo/Title --}}
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-blue-900">ISMEI</h2>
                <p class="text-sm text-black/40 mt-1">Create your account to join the symposium</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                {{-- Name Field --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Full Name</label>
                    <input type="text" name="name" required
                        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none transition-all">
                </div>

                {{-- Email Field --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none transition-all">
                </div>

                {{-- Password Field --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none transition-all">
                </div>

                {{-- Google reCAPTCHA Container --}}
                <div class="mb-6 flex justify-center">
                    {!! NoCaptcha::display() !!}
                </div>
                @error('g-recaptcha-response')
                    <p class="text-red-500 text-xs mt-[-15px] mb-4 text-center">{{ $message }}</p>
                @enderror

                {{-- Submit Button --}}
                <button type="submit" 
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition duration-300 flex items-center justify-center gap-2 shadow-lg shadow-blue-900/20">
                    <i data-feather="user-plus" class="w-4 h-4"></i>
                    Register Now
                </button>

                <p class="text-center text-sm text-black/40 mt-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-900 font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>

    {{-- Script reCAPTCHA & Feather Icons --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
</x-guest-layout>