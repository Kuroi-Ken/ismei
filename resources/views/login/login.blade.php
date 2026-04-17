<x-layout :footer="false" :header="false" :chevron="false" title="Admin Login">

    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 to-indigo-950 p-6">
        
        <form class="w-full max-w-md" action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="bg-slate-50 shadow-2xl rounded-3xl p-8 md:p-10 border border-white/20">
                
                <div class="flex flex-col items-center mb-8">
                    <div class="flex gap-4 mb-4">
                        <img src="../assets/seameo.png" class="h-16 w-auto object-contain" alt="SEAMEO Logo">
                        <img src="../assets/seaqim.png" class="h-16 w-auto object-contain" alt="SEAQIM Logo">
                    </div>
                    <div class="text-center">
                        <h1 class="text-3xl font-extrabold tracking-tight text-blue-900">ISMEI</h1>
                        <p class="text-blue-600 font-medium italic">Administrator Portal</p>
                    </div>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg text-sm animate-pulse">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20 border-red-300">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Email Address</label>
                        <input 
                            id="email"
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 placeholder:text-slate-400 @error('email') border-red-400 @enderror"
                            placeholder="name@example.com">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Password</label>
                        <input 
                            id="password"
                            type="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 placeholder:text-slate-400"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6 mb-8">
                    <label class="inline-flex items-center group cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        <span class="ml-2 text-sm text-slate-600 group-hover:text-blue-900 transition-colors">Remember me</span>
                    </label>
                    <a href="/forgot-the-password" class="text-sm font-medium text-blue-700 hover:text-blue-800 hover:underline transition-colors">
                        Forgot Password?
                    </a>
                </div>
                @csrf
                <button type="submit" 
                    class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-900/20 transform active:scale-[0.98] transition-all duration-200">
                    Sign In to Dashboard
                </button>
            </div>
            
            <p class="text-center text-blue-200/60 text-xs mt-8">
                &copy; {{ date('Y') }} ISMEI SEAQIM. All rights reserved.
            </p>
        </form>
    </div>

</x-layout>