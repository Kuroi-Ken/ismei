@php
    $current = request()->route()->getName();
@endphp

<div id="sidebar" class="h-screen w-64 bg-blue-200 rounded-tr-2xl flex flex-col transition-all duration-300 relative group">
    
    {{-- Tombol Toggle (Floating) --}}
    <button onclick="toggleSidebar()" class="absolute -right-3 top-10 bg-blue-900 text-white rounded-full p-1 shadow-lg z-50 hover:scale-110 transition">
        <i id="toggle-icon" data-feather="chevron-left" class="w-6 h-6"></i>
    </button>

    {{-- Logo --}}
    <div class="w-full border-b border-black/20 pb-5 pt-6 px-5 overflow-hidden">
        <h2 class="sidebar-text text-center text-blue-900 font-medium text-[30px] whitespace-nowrap">ISMEI</h2>
        <h3 class="sidebar-text text-[18px] text-blue-900 text-center whitespace-nowrap">Admin Panel</h3>
        {{-- Logo Mini (muncul saat minimize) --}}
        <h2 class="sidebar-mini-text hidden text-center text-blue-900 font-bold text-xl">IS</h2>
    </div>

    {{-- Menu --}}
    <div class="px-3 pt-3 flex-1 overflow-y-auto overflow-x-hidden">
        <p class="sidebar-text p-3 text-[15px] text-black/60 whitespace-nowrap">Navigations</p>

        <ul class="flex flex-col gap-1">
            @php
                $menus = [
                    ['Dashboard',   'home',           'admin.dashboard'],
                    ['Symposium',   'users',          'admin.speaker.index'],
                    ['Informations','info',           null],
                    ['Archives',    'archive',        null],
                    ['About',       'more-horizontal',null],
                ];
            @endphp

            @foreach($menus as [$label, $icon, $route])
                @php
                    $isActive = $route && (
                        $current === $route ||
                        ($route === 'admin.dashboard'    && $current === 'admin.content.home') ||
                        ($route === 'admin.speaker.index' && str_starts_with($current ?? '', 'admin.speaker'))
                    );
                    $url = $route ? route($route) : '#';
                @endphp

                <li class="group/item">
                    <a href="{{ $url }}" 
                       class="flex items-center py-2.5 px-3 rounded-lg duration-300 
                       {{ $isActive 
                            ? 'bg-white text-blue-900 ml-3' 
                            : 'text-blue-900 hover:bg-blue-900 hover:text-white hover:ml-3' }}">
                        
                        <i data-feather="{{ $icon }}" class="w-5 h-5 flex-shrink-0"></i>
                        <span class="sidebar-text pl-3 font-medium text-[15px] whitespace-nowrap opacity-100 transition-opacity duration-300">
                            {{ $label }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- User & Logout --}}
    <div class="px-3 pb-6 border-t border-black/20 pt-4">
        <div class="flex items-center gap-3 px-2 pb-3 overflow-hidden">
            <div class="w-8 h-8 rounded-full bg-blue-900 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="sidebar-text overflow-hidden transition-all duration-300">
                <p class="text-xs font-semibold text-blue-900 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-black/40 truncate">Administrator</p>
            </div>
        </div>
        
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-2 w-full py-2 px-3 rounded-lg text-red-700 hover:bg-red-700 hover:text-white duration-300 group">
                <i data-feather="log-out" class="w-5 h-5 shrink-0"></i>
                <span class="sidebar-text text-[15px] font-medium whitespace-nowrap">Logout</span>
            </button>
        </form>
    </div>
</div>

<script src="{{ asset('js/sidebar.js') }}"></script>