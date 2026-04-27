<x-layout title="Hall of Informations">

    @php
        $callForSubmission = \App\Models\Information::findBySlug('call_for_submission');
        $schedule          = \App\Models\Information::findBySlug('schedule');
    @endphp

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

    <section class="relative z-20 -mt-16 max-w-7xl mx-auto px-4 ">
        <div class="bg-white rounded-[3rem] shadow-2xl shadow-blue-900/10 p-8 md:p-16 border border-slate-100">
            
            {{-- Header Section --}}
            <div class="text-center mb-16">
                <h2 class="text-blue-600 font-bold uppercase tracking-[0.3em] text-sm mb-3">Updates</h2>
                <h1 class="text-4xl md:text-5xl font-black text-blue-900 tracking-tighter uppercase mb-4">Main Informations</h1>
                <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto">
                    Stay up-to-date with the latest news, submission deadlines, and event schedules.
                </p>
            </div>

            <div class="space-y-16">
                
                {{-- 1. TOP CARDS (Bento Style) --}}
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    
                    {{-- Card: Call for Submissions --}}
                    @php $callHasContent = $callForSubmission->hasContent(); @endphp
                    <div class="group relative overflow-hidden bg-gradient-to-br from-blue-900 to-blue-800 rounded-3xl p-8 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-900/30 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:scale-110 transition-transform">
                            <i data-feather="file-text" class="w-24 h-24 text-white"></i>
                        </div>
                        <div class="relative z-10 flex flex-col h-full">
                            <h3 class="text-blue-300 font-bold text-xs uppercase tracking-widest mb-2">Academic</h3>
                            <h2 class="text-2xl font-bold text-white mb-4 uppercase">
                                {{ ($callForSubmission && $callForSubmission->title) ? $callForSubmission->title : 'Call for Submissions' }}
                            </h2>
                            <p class="text-blue-100/80 font-light line-clamp-3 mb-8">
                                {{ $callHasContent ? Str::limit(strip_tags($callForSubmission->body), 120) : 'Contribution details will be updated soon.' }}
                            </p>
                            <div class="mt-auto">
                                @if($callHasContent)
                                    <a href="{{ route('information.show', 'call_for_submission') }}" class="inline-flex items-center gap-2 bg-white text-blue-900 px-6 py-2.5 rounded-full font-bold text-sm hover:bg-blue-50 transition">
                                        See Details <i data-feather="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                @else
                                    <span class="text-blue-300 text-xs italic">Upcoming Content</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Card: Schedule --}}
                    @php $scheduleHasContent = $schedule->hasContent(); @endphp
                    <div class="group relative overflow-hidden bg-white border border-slate-200 rounded-3xl p-8 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-2 hover:border-blue-200">
                        <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:scale-110 transition-transform">
                            <i data-feather="calendar" class="w-24 h-24 text-blue-900"></i>
                        </div>
                        <div class="relative z-10 flex flex-col h-full">
                            <h3 class="text-blue-600 font-bold text-xs uppercase tracking-widest mb-2">Timetable</h3>
                            <h2 class="text-2xl font-bold text-blue-900 mb-4 uppercase">
                                {{ ($schedule && $schedule->title) ? $schedule->title : 'Event Schedule' }}
                            </h2>
                            <p class="text-slate-500 font-light line-clamp-3 mb-8 text-justify">
                                {{ $scheduleHasContent ? Str::limit(strip_tags($schedule->body), 120) : 'The detailed schedule is currently being finalized.' }}
                            </p>
                            <div class="mt-auto">
                                @if($scheduleHasContent)
                                    <a href="{{ route('information.show', 'schedule') }}" class="inline-flex items-center gap-2 bg-blue-900 text-white px-6 py-2.5 rounded-full font-bold text-sm hover:bg-blue-800 transition shadow-lg shadow-blue-900/20">
                                        View Timeline <i data-feather="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                @else
                                    <span class="text-slate-400 text-xs italic">Available Soon</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2. SEARCH & LIST AREA --}}
                <div class="max-w-5xl mx-auto space-y-10">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 border-t border-slate-100 pt-16">
                        <h2 class="text-2xl font-bold text-blue-900 uppercase tracking-tighter">Latest Announcements</h2>
                        
                        {{-- Search Bar --}}
                        <form method="GET" action="{{ route('information.index') }}" class="relative w-full md:w-96 group">
                            <input type="text" name="search" value="{{ $keyword ?? '' }}" placeholder="Search news..." 
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl py-3 pl-12 pr-4 outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900 focus:bg-white transition-all">
                            <i data-feather="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 group-focus-within:text-blue-900 transition-colors"></i>
                        </form>
                    </div>

                    {{-- Posts Grid --}}
                    @if($announcements->isEmpty())
                        <div class="text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                            <div class="bg-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                                <i data-feather="info" class="text-slate-300 w-8 h-8"></i>
                            </div>
                            <p class="text-slate-400 font-medium">No results found for your search.</p>
                        </div>
                    @else
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($announcements as $ann)
                                <a href="{{ route('information.show', $ann->slug) }}" class="group flex flex-col bg-white border border-blue-200 rounded-xl p-6 transition-all duration-300 hover:shadow-xl hover:shadow-blue-900/5 hover:border-blue-900">
                                    <span class="bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-widest w-fit px-3 py-1 rounded-lg mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                        News
                                    </span>
                                    <h3 class="text-xl font-bold text-blue-900 leading-tight mb-3 group-hover:text-blue-600 transition-colors">
                                        {{ $ann->title }}
                                    </h3>
                                    <p class="text-slate-500 text-sm font-light line-clamp-3 mb-6">
                                        {{ Str::limit(strip_tags($ann->body), 100) }}
                                    </p>
                                    <div class="mt-auto flex items-center gap-2 text-slate-400 text-[11px] font-medium uppercase tracking-tighter">
                                        <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                        {{ $ann->time_ago }}
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        {{-- Custom Pagination --}}
                        @if($announcements->hasPages())
                            <div class="flex justify-center pt-10">
                                {{ $announcements->links() }}
                            </div>
                        @endif
                    @endif
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