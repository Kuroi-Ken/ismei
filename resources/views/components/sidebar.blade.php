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
    <div class="px-5 pt-3">
        <p class="p-3 text-[15px] text-black/60">Navigations</p>

        <ul class="flex flex-col gap-1">

            @php
                // Definisi menu: [label, icon, nama route]
                $menus = [
                    ['Dashboard',        'home',           'admin.content.home'],
                    ['Informations',     'info',            null],
                    ['Symposium',        'sunset',          null],
                    ['Archives',         'archive',         null],
                    ['About',            'more-horizontal', null],
                ];
            @endphp

            @foreach($menus as [$label, $icon, $route])
                @php
                    $isActive = $route && $current === $route;
                    $url      = $route ? route($route) : '#';
                @endphp

                <li class="flex items-center py-1 rounded-lg duration-300
                    {{ $isActive ? 'bg-blue-900 text-white pl-5' : 'text-blue-900 hover:bg-blue-900 hover:text-white hover:pl-5' }}">
                    <i data-feather="{{ $icon }}" class="w-5 h-5 flex-shrink-0"></i>
                    <a href="{{ $url }}" class="pl-2 w-full">{{ $label }}</a>
                </li>
            @endforeach

        </ul>
    </div>

    <div class="px-5 pb-6 border-t border-black/20 pt-4">
        <p class="px-3 pb-2 text-xs text-black/40">{{ Auth::user()->name }}</p>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full py-1 px-3 rounded-lg text-red-700
                       hover:bg-red-700 hover:text-white duration-300">
                <i data-feather="log-out" class="w-5 h-5 shrink-0"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>