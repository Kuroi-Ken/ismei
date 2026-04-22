<x-layout title="Hall of Informations">

    @php
        $callForSubmission = \App\Models\Information::findBySlug('call_for_submission');
        $schedule          = \App\Models\Information::findBySlug('schedule');
        $announcements     = \App\Models\Information::where('type', 'optional')
                                ->where('is_active', true)
                                ->orderBy('order')
                                ->get();
    @endphp

    {{-- ── Hero ─────────────────────────────────────────────────── --}}
    <section class="bg-blue-900 py-24 relative -z-20 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0 uppercase">ismei</h1>
            <div class="pt-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white uppercase mb-4">informations</h2>
                <p class="font-kaushan text-2xl text-blue-200">"Everything you need to know, all in one place."</p>
            </div>
        </div>
    </section>

    {{-- ── Main cards ──────────────────────────────────────────── --}}
    <section class="bg-white z-20 rounded-4xl p-15 shadow-lg max-w-7xl mx-auto leading-tight -mt-12">
        <h1 class="text-[40px] max-w-7xl mx-auto text-[#1E3A8A] text-center font-bold tracking-tighter pt-5 uppercase">Main Informations</h1>
        <h1 class="text-[25px] max-w-7xl mb-8 mx-auto text-[#1E3A8A] text-center font-light uppercase">Stay up-to-date With Our Latest News and Events.</h1>

        <div class="flex flex-col gap-10">

            {{-- ── Fixed Cards: Call for Submissions & Schedule ── --}}
            <div class="flex gap-10 justify-center flex-wrap">

                {{-- Call for Submissions --}}
                @php
                    $callHasContent = $callForSubmission && $callForSubmission->is_active && $callForSubmission->hasContent();
                @endphp

                @if($callHasContent)
                    <a href="{{ route('information.show', 'call_for_submission') }}"
                        class="group shadow-lg border border-blue-50 rounded-2xl max-w-lg flex-1 min-w-72 flex flex-col hover:-translate-y-2 hover:border-blue-900 hover:shadow-xl transition-all duration-300 cursor-pointer">
                @else
                    <div class="group shadow-lg border border-blue-50 rounded-2xl max-w-lg flex-1 min-w-72 flex flex-col cursor-default">
                @endif

                        <div class="flex flex-col gap-4 bg-white p-6 rounded-2xl flex-1">

                            {{-- Featured image thumbnail --}}
                            @if($callForSubmission && $callForSubmission->image_url)
                                <div class="w-full h-44 rounded-xl overflow-hidden">
                                    <img src="{{ $callForSubmission->image_url }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        alt="Call for Submissions">
                                </div>
                            @endif

                            <div class="flex items-center justify-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700 flex-shrink-0">
                                    <i data-feather="file-text" class="w-4 h-4"></i>
                                </div>
                                <h2 class="text-[28px] font-bold uppercase tracking-tighter text-blue-900">
                                    {{ ($callForSubmission && $callForSubmission->title) ? $callForSubmission->title : 'Call for Submissions' }}
                                </h2>
                            </div>

                            @if($callHasContent)
                                <p class="text-[15px] font-light leading-relaxed text-slate-500 flex-1 line-clamp-3">
                                    {{ Str::limit(strip_tags($callForSubmission->body), 160) }}
                                </p>
                            @else
                                <p class="text-[17.63px] max-w-2xl font-light flex-1 text-black/40 italic text-center">
                                    Content will be available soon. Please check back later.
                                </p>
                            @endif

                            <div class="flex items-center justify-between border-t border-slate-100 pt-3 mt-auto">
                                @if($callForSubmission && $callForSubmission->created_at)
                                    <div class="flex gap-1.5 items-center text-black/40">
                                        <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                        <span class="text-xs font-light">{{ $callForSubmission->time_ago }}</span>
                                    </div>
                                @else
                                    <span></span>
                                @endif

                                @if($callHasContent)
                                    <span class="inline-flex items-center gap-1 text-sm text-blue-700 font-semibold group-hover:gap-2 transition-all">
                                        Read More <i data-feather="arrow-right" class="w-4 h-4"></i>
                                    </span>
                                @endif
                            </div>
                        </div>

                @if($callHasContent)
                    </a>
                @else
                    </div>
                @endif

                {{-- Schedule --}}
                @php
                    $scheduleHasContent = $schedule && $schedule->is_active && $schedule->hasContent();
                @endphp

                @if($scheduleHasContent)
                    <a href="{{ route('information.show', 'schedule') }}"
                        class="group shadow-lg border border-blue-50 rounded-2xl max-w-lg flex-1 min-w-72 flex flex-col hover:-translate-y-2 hover:border-blue-900 hover:shadow-xl transition-all duration-300 cursor-pointer">
                @else
                    <div class="group shadow-lg border border-blue-50 rounded-2xl max-w-lg flex-1 min-w-72 flex flex-col cursor-default">
                @endif

                        <div class="flex flex-col gap-4 bg-white p-6 rounded-2xl flex-1">

                            @if($schedule && $schedule->image_url)
                                <div class="w-full h-44 rounded-xl overflow-hidden">
                                    <img src="{{ $schedule->image_url }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        alt="Schedule">
                                </div>
                            @endif

                            <div class="flex items-center justify-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700 flex-shrink-0">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                </div>
                                <h2 class="text-[28px] font-bold uppercase tracking-tighter text-blue-900">
                                    {{ ($schedule && $schedule->title) ? $schedule->title : 'Schedule' }}
                                </h2>
                            </div>

                            @if($scheduleHasContent)
                                <p class="text-[15px] font-light leading-relaxed text-slate-500 flex-1 line-clamp-3">
                                    {{ Str::limit(strip_tags($schedule->body), 160) }}
                                </p>
                            @else
                                <p class="text-[17.63px] max-w-2xl font-light flex-1 text-black/40 italic text-center">
                                    The schedule will be published closer to the event. Stay tuned!
                                </p>
                            @endif

                            <div class="flex items-center justify-between border-t border-slate-100 pt-3 mt-auto">
                                @if($schedule && $schedule->created_at)
                                    <div class="flex gap-1.5 items-center text-black/40">
                                        <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                        <span class="text-xs font-light">{{ $schedule->time_ago }}</span>
                                    </div>
                                @else
                                    <span></span>
                                @endif

                                @if($scheduleHasContent)
                                    <span class="inline-flex items-center gap-1 text-sm text-blue-700 font-semibold group-hover:gap-2 transition-all">
                                        Read More <i data-feather="arrow-right" class="w-4 h-4"></i>
                                    </span>
                                @endif
                            </div>
                        </div>

                @if($scheduleHasContent)
                    </a>
                @else
                    </div>
                @endif

            </div>

            {{-- ── Search ── --}}
            <div class="w-full max-w-7xl flex flex-col gap-10 mx-auto">
                <div class="flex items-center w-full mx-auto px-3 py-2 bg-white border border-slate-200 rounded-full shadow-lg focus-within:border-blue-900 transition-all">
                    <div class="pl-4 text-slate-400">
                        <i data-feather="search" class="w-5 h-5"></i>
                    </div>
                    <input
                        type="text"
                        placeholder="Find your informations..."
                        class="flex-1 bg-transparent border-none focus:ring-0 px-4 py-2 text-slate-800 outline-none"
                    />
                    <button class="bg-blue-900 text-white px-6 py-2 rounded-full font-medium hover:bg-blue-800 transition-colors cursor-pointer">
                        Search
                    </button>
                </div>

                {{-- ── Announcement Cards ── --}}
                <div class="flex justify-center gap-10 flex-wrap">
                    @forelse($announcements as $ann)
                        @php $annHasContent = $ann->hasContent(); @endphp

                        @if($annHasContent)
                            <a href="{{ route('information.show', $ann->slug) }}"
                                class="group grid gap-3 bg-white shadow-2xl p-5 rounded-3xl border border-blue-50 max-w-sm flex-1 min-w-64
                                       hover:-translate-y-2 hover:border-blue-900 hover:shadow-xl cursor-pointer transition-all duration-300">
                        @else
                            <div class="group grid gap-3 bg-white shadow-2xl p-5 rounded-3xl border border-blue-50 max-w-sm flex-1 min-w-64 cursor-default">
                        @endif

                                @if($ann->hasContent())

                                    @if($ann->image_url)
                                        <div class="w-full h-36 rounded-xl overflow-hidden">
                                            <img src="{{ $ann->image_url }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                alt="{{ $ann->title }}">
                                        </div>
                                    @endif

                                    @if($ann->title)
                                        <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900 font-medium">
                                            {{ $ann->title }}
                                        </h1>
                                    @else
                                        <span class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900 font-medium">Announcement</span>
                                    @endif

                                    <p class="text-[15.75px] font-light text-slate-600 line-clamp-3">
                                        {{ Str::limit(strip_tags($ann->body), 140) }}
                                    </p>

                                    <div class="flex items-center justify-between border-t border-slate-100 pt-2 mt-auto">
                                        <div class="flex gap-1.5 items-center text-black/40">
                                            <i data-feather="clock" class="w-3 h-3"></i>
                                            <span class="text-[11px] font-light">{{ $ann->time_ago }}</span>
                                        </div>
                                        @if($annHasContent)
                                            <span class="inline-flex items-center gap-1 text-xs text-blue-700 font-semibold ml-auto group-hover:gap-2 transition-all">
                                                Read More <i data-feather="arrow-right" class="w-3 h-3"></i>
                                            </span>
                                        @endif
                                    </div>

                                @else
                                    <div class="flex flex-col items-center justify-center py-10 gap-3 text-black/30">
                                        <i data-feather="bell-off" class="w-8 h-8"></i>
                                        <p class="text-sm font-light text-center">No recent information available.<br>Check back later.</p>
                                    </div>
                                @endif

                        @if($annHasContent)
                            </a>
                        @else
                            </div>
                        @endif

                    @empty
                        <div class="w-full py-12 flex flex-col items-center gap-3 text-black/30 border border-dashed border-blue-100 rounded-2xl">
                            <i data-feather="info" class="w-8 h-8"></i>
                            <p class="text-sm font-light">No announcements at this time.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    {{-- Poster & Pamphlet --}}
    <section class="bg-white flex flex-col my-30 gap-30">
        <div class="flex flex-col gap-12">
            <div class="leading-tight text-center">
                <h1 class="tracking-tighter max-w-7xl mx-auto font-bold text-[40px] text-blue-900 uppercase w-full">
                    Poster
                    <span class="font-bold text-[40px] text-black max-w-7xl mx-auto uppercase w-full pb-5">& Pamphlet</span>
                </h1>
                <h3 class="tracking-tighter max-w-7xl mx-auto font-light text-[25px] text-blue-900 uppercase w-full">Explore Our Official Media</h3>
            </div>
            <div class="flex justify-center gap-10 max-w-7xl w-full mx-auto">
                @for ($i=0;$i<3;$i++)
                    <div class="p-3 bg-blue-50 hover:border hover:border-blue-900 border border-blue-50 rounded-xl duration-400 transition-all">
                        <img class="mx-auto w-90.75 h-140 object-cover shadow-2xl" src="../assets/test.jpeg" alt="">
                    </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Announcement section (bottom) --}}
    <section class="bg-white pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-15 leading-tight">
                <h1 class="text-5xl font-black text-blue-900 uppercase tracking-tight mb-2">
                    Announcement
                </h1>
                <div class="flex items-center justify-center gap-4">
                    <h2 class="text-[25px] font-light text-blue-900 tracking-wide uppercase">
                        Participant Results & Nominations
                    </h2>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @for ($i=0; $i<3; $i++)
                    <a href="#" class="group relative">
                        <div class="absolute inset-0 bg-blue-900 rounded-[2.5rem] translate-y-4 opacity-0"></div>
                        <div class="relative bg-white border border-slate-100 p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50 flex flex-col items-center text-center transition-all duration-500 group-hover:-translate-y-3 group-hover:border-blue-900">
                            <div class="w-20 h-20 bg-blue-50 text-blue-900 rounded-2xl flex items-center justify-center mb-8 transition-colors duration-500 shadow-inner">
                                <i data-feather="file-text" class="w-10 h-10"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-4">Accepted Abstract</h3>
                            <p class="text-slate-500 leading-relaxed font-light mb-8">
                                Here's the complete list of all participants whose abstracts have been officially accepted for ISMEI 2026.
                            </p>
                            <div class="mt-auto flex items-center gap-2 text-blue-900 font-bold text-sm tracking-widest uppercase border-b-2 border-transparent pb-1">
                                Check Results
                                <i data-feather="arrow-right" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>

</x-layout>