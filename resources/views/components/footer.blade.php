<footer class="bg-slate-900 w-full pt-20 pb-10 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 pb-16 border-b border-white/10">

            <div class="flex flex-col items-center md:items-start space-y-6">
                <div class="bg-white p-2 rounded-xl inline-block">
                    <img class="w-[70px] h-auto" src="../assets/seameo.png" alt="SEAQiM Logo">
                </div>
                <p class="text-slate-400 text-sm leading-relaxed max-w-xs text-center md:text-left font-light">
                    <span class="font-bold text-white block mb-2 uppercase tracking-widest text-xs">Office Address</span>
                    Jl. Kaliurang Km.6 Sambisari, Condongcatur, Depok, Sleman, Yogyakarta, Indonesia
                </p>
                <div class="flex gap-4">
                    @foreach(['twitter', 'facebook', 'instagram', 'globe'] as $social)
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/5 text-white hover:bg-blue-600 hover:-translate-y-1 transition-all duration-300">
                        <i class="w-5 h-5" data-feather="{{ $social }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white font-black uppercase tracking-tighter text-lg mb-8">Quick Menu</h4>
                <ul class="space-y-4 text-sm font-light">
                    <li><a href="/" class="text-slate-400 hover:text-white flex items-center gap-2 group transition-colors">
                     Home
                    </a></li>
                    <li><a href="/information" class="text-slate-400 hover:text-white flex items-center gap-2 group transition-colors">
                     Information
                    </a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white flex items-center gap-2 group transition-colors">
                     Announcement
                    </a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white flex items-center gap-2 group transition-colors">
                     Proceeding
                    </a></li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white font-black uppercase tracking-tighter text-lg mb-8">Symposium</h4>
                <ul class="space-y-4 text-sm font-light text-slate-400">
                    <li><a href="#" class="hover:text-white transition-colors">Post Symposium Workshop</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Keynote Speakers</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Schedule & Venue</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">About ISMEI</a></li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-white font-black uppercase tracking-tighter text-lg mb-8">Contact Us</h4>
                <div class="space-y-4">
                    <a href="mailto:ismei@qitepinmath.org" class="group flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5 hover:border-blue-500/50 transition-all">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                            <i data-feather="mail" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-widest">Email</span>
                            <span class="text-white text-xs font-medium">ismei@qitepinmath.org</span>
                        </div>
                    </a>
                    <a href="#" class="group flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5 hover:border-blue-500/50 transition-all">
                        <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center text-white">
                            <i data-feather="phone" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-widest">WhatsApp</span>
                            <span class="text-white text-xs font-medium">Contact Helpdesk</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <div class="pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-slate-500 text-xs font-light">
                &copy; 2026 <span class="text-white font-medium italic">8th ISMEI Symposium</span>. All rights reserved.
            </p>
            <div class="flex gap-8 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>