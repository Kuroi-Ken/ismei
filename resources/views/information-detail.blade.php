<x-layout :title="$information->title ?? 'Information Detail'">

    {{-- ── Hero ─────────────────────────────────────────────────── --}}
    <section class="bg-blue-900 py-24 relative -z-20 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0 uppercase">ismei</h1>
            <div class="pt-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white uppercase mb-4">
                    {{ $information->title ?? 'Information' }}
                </h2>
                <div class="flex items-center gap-3 text-blue-200 text-sm">
                    <a href="/information" class="hover:text-white transition">Informations</a>
                    <span>/</span>
                    <span class="text-white">{{ $information->title ?? $information->label }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Content ──────────────────────────────────────────────── --}}
    <section class="bg-white z-20 rounded-4xl shadow-lg max-w-5xl mx-auto -mt-12 mb-20 overflow-hidden">

        {{-- Featured Image --}}
        @if($information->image_url)
            <div class="w-full h-72 md:h-96 overflow-hidden">
                <img src="{{ $information->image_url }}"
                    class="w-full h-full object-cover"
                    alt="{{ $information->title }}">
            </div>
        @endif

        <div class="p-10 md:p-16">

            {{-- Meta --}}
            <div class="flex items-center gap-4 mb-8 text-sm text-black/40">
                @if($information->type === 'fixed')
                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-medium text-xs uppercase tracking-widest">
                        {{ $information->label }}
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 font-medium text-xs uppercase tracking-widest">
                        Announcement
                    </span>
                @endif

                @if($information->created_at)
                    <span class="flex items-center gap-1.5">
                        <i data-feather="clock" class="w-3.5 h-3.5"></i>
                        {{ $information->time_ago }}
                    </span>
                @endif
            </div>

            {{-- Title --}}
            @if($information->title)
                <h1 class="text-3xl md:text-4xl font-black text-blue-900 tracking-tighter mb-8 leading-tight">
                    {{ $information->title }}
                </h1>
            @endif

            {{-- Body --}}
            @if($information->body && strip_tags($information->body) !== '')
                <div class="prose prose-blue prose-lg max-w-none
                            prose-headings:text-blue-900 prose-headings:font-bold
                            prose-p:text-slate-600 prose-p:leading-relaxed
                            prose-a:text-blue-700 prose-a:no-underline hover:prose-a:underline
                            prose-strong:text-slate-800
                            prose-ul:text-slate-600 prose-ol:text-slate-600
                            prose-table:border prose-table:border-slate-200
                            prose-th:bg-blue-50 prose-th:text-blue-900
                            prose-td:border prose-td:border-slate-200 prose-td:p-3">
                    {!! $information->body !!}
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-16 gap-4 text-black/30">
                    <i data-feather="file-text" class="w-12 h-12"></i>
                    <p class="text-lg font-light">Content will be available soon. Please check back later.</p>
                </div>
            @endif

            {{-- Back button --}}
            <div class="mt-12 pt-8 border-t border-slate-100">
                <a href="/information"
                    class="inline-flex items-center gap-2 text-blue-900 font-semibold hover:gap-3 transition-all duration-200">
                    <i data-feather="arrow-left" class="w-4 h-4"></i>
                    Back to Informations
                </a>
            </div>

        </div>
    </section>

</x-layout>