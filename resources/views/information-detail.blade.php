<x-layout title="{{ $information->title ?? $information->label }}">

    {{-- ── Hero ─────────────────────────────────────────────────────────── --}}
    <section class="bg-blue-900 py-24 relative -z-20 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>

        @if($information->image_url)
            {{-- Dimmed background image when featured image exists --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ $information->image_url }}"
                    class="w-full h-full object-cover opacity-20"
                    alt="">
            </div>
        @endif

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0 uppercase">ismei</h1>
            <div class="pt-10">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-blue-300 text-sm mb-5">
                    <a href="/" class="hover:text-white transition-colors">Home</a>
                    <i data-feather="chevron-right" class="w-3.5 h-3.5 opacity-60"></i>
                    <a href="/information" class="hover:text-white transition-colors">Informations</a>
                    <i data-feather="chevron-right" class="w-3.5 h-3.5 opacity-60"></i>
                    <span class="text-white/70 truncate max-w-xs">{{ $information->title ?? $information->label }}</span>
                </nav>

                {{-- Badge --}}
                @if($information->type === 'fixed')
                    <span class="inline-block mb-3 px-3 py-1 rounded-full bg-blue-500/30 border border-blue-400/40 text-blue-200 text-xs font-semibold uppercase tracking-widest">
                        {{ $information->label }}
                    </span>
                @else
                    <span class="inline-block mb-3 px-3 py-1 rounded-full bg-amber-500/30 border border-amber-400/40 text-amber-200 text-xs font-semibold uppercase tracking-widest">
                        Announcement
                    </span>
                @endif

                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight max-w-3xl">
                    {{ $information->title ?? $information->label }}
                </h2>

                {{-- Time ago (auto from created_at) --}}
                <div class="flex items-center gap-2 text-blue-200 text-sm">
                    <i data-feather="clock" class="w-4 h-4"></i>
                    <span>Posted {{ $information->time_ago }}</span>
                    <span class="opacity-40">·</span>
                    <span class="opacity-60 text-xs">
                        {{ $information->created_at->format('d M Y, H:i') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Content Card ────────────────────────────────────────────────── --}}
    <section class="max-w-4xl mx-auto px-6 -mt-12 mb-24 relative z-20">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Featured image --}}
            @if($information->image_url)
                <div class="w-full">
                    <img src="{{ $information->image_url }}"
                        class="w-full max-h-[420px] object-cover"
                        alt="{{ $information->title }}">
                </div>
            @endif

            <div class="p-10 md:p-14">

                @if(!$information->hasContent())
                    {{-- Empty state --}}
                    <div class="flex flex-col items-center justify-center py-20 gap-4 text-black/25">
                        <div class="w-20 h-20 rounded-2xl bg-blue-50 flex items-center justify-center">
                            <i data-feather="clock" class="w-10 h-10 text-blue-200"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-400 text-center">Content Coming Soon</h3>
                        <p class="text-sm font-light text-center max-w-sm text-slate-400">
                            This section will be updated soon. Please check back later for more information.
                        </p>
                        <a href="/information"
                            class="mt-2 inline-flex items-center gap-2 px-6 py-2.5 bg-blue-900 text-white text-sm font-medium rounded-xl hover:bg-blue-800 transition">
                            <i data-feather="arrow-left" class="w-4 h-4"></i>
                            Back to Informations
                        </a>
                    </div>

                @else
                    {{-- Rich text body --}}
                    <div class="prose prose-blue prose-lg max-w-none
                        prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-blue-900
                        prose-p:text-slate-600 prose-p:leading-relaxed prose-p:text-[17px]
                        prose-strong:text-blue-900 prose-strong:font-semibold
                        prose-a:text-blue-700 prose-a:font-medium prose-a:no-underline hover:prose-a:underline
                        prose-ul:text-slate-600 prose-ol:text-slate-600
                        prose-li:leading-relaxed prose-li:text-[16px]
                        prose-table:text-sm prose-table:w-full
                        prose-th:bg-blue-50 prose-th:text-blue-900 prose-th:font-semibold prose-th:px-4 prose-th:py-3
                        prose-td:px-4 prose-td:py-2.5 prose-td:border-b prose-td:border-slate-100
                        prose-img:rounded-xl prose-img:shadow-md
                        prose-blockquote:border-l-4 prose-blockquote:border-blue-400 prose-blockquote:bg-blue-50 prose-blockquote:px-6 prose-blockquote:py-3 prose-blockquote:rounded-r-xl prose-blockquote:not-italic prose-blockquote:text-blue-800">
                        {!! $information->body !!}
                    </div>

                    {{-- Footer / back --}}
                    <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-2 text-sm text-slate-400">
                            <i data-feather="clock" class="w-4 h-4"></i>
                            <span>Last updated {{ $information->updated_at->diffForHumans() }}</span>
                        </div>
                        <a href="/information"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-50 border border-blue-200 text-blue-900 text-sm font-medium rounded-xl hover:bg-blue-900 hover:text-white hover:border-blue-900 transition">
                            <i data-feather="arrow-left" class="w-4 h-4"></i>
                            Back to Informations
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </section>

</x-layout>