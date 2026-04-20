@php
    $current = request()->route()->getName();
@endphp

<div class="h-screen w-2xs bg-blue-200 rounded-tr-2xl flex flex-col">

    {{-- Logo --}}
    <div class="w-full border-b border-black/20 pb-5 pt-6 px-5">
        <h2 class="text-center text-blue-900 font-medium text-[30px]">ISMEI</h2>
        <h3 class="text-[18px] text-blue-900 text-center">Admin Panel</h3>
    </div>

    {{-- Menu --}}
    <div class="px-5 pt-3 flex-1 overflow-y-auto">
        <p class="p-3 text-[15px] text-black/60">Navigations</p>

        <ul class="flex flex-col gap-1">

            @php
                $menus = [
                    ['Dashboard',   'home',           'admin.dashboard'],
                    ['Symposium',   'users',          'admin.speakers.index'],
                    ['Informations','info',           null],
                    ['Archives',    'archive',        null],
                    ['About',       'more-horizontal',null],
                ];
            @endphp

            @foreach($menus as [$label, $icon, $route])
                @php
                    $isActive = $route && (
                        $current === $route ||
                        ($route === 'admin.dashboard'      && $current === 'admin.content.home') ||
                        ($route === 'admin.speakers.index' && str_starts_with($current ?? '', 'admin.speakers'))
                    );
                    $url = $route ? route($route) : '#';
                @endphp

                <li class="flex items-center py-2 px-3 rounded-lg duration-300 cursor-pointer
                    {{ $isActive
                        ? 'bg-blue-900 text-white pl-5'
                        : 'text-blue-900 hover:bg-blue-900 hover:text-white hover:pl-5' }}">
                    <i data-feather="{{ $icon }}" class="w-5 h-5 flex-shrink-0"></i>
                    <a href="{{ $url }}" class="pl-2 w-full font-medium text-[15px]">{{ $label }}</a>
                </li>
            @endforeach

        </ul>
    </div>

    {{-- User & Logout --}}
    <div class="px-5 pb-6 border-t border-black/20 pt-4">
        <div class="flex items-center gap-3 px-3 pb-3">
            <div class="w-8 h-8 rounded-full bg-blue-900 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-xs font-semibold text-blue-900 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-black/40 truncate">Administrator</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full py-2 px-3 rounded-lg text-red-700
                       hover:bg-red-700 hover:text-white duration-300">
                <i data-feather="log-out" class="w-5 h-5 shrink-0"></i>
                <span class="text-[15px] font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>  