<x-layout title="Symposium">
    <section class="bg-blue-900 py-24 relative -z-20 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0 uppercase">ismei</h1>
            <div class="pt-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white uppercase mb-4">Symposium</h2>
                <p class="font-kaushan text-2xl text-blue-200">"Meet Our Incredible Guest Speakers."</p>
            </div>
        </div>
    </section>

    @php
        $speakers = \App\Models\Speaker::active()->get();
    @endphp

    {{-- ===== SPEAKER PHOTO CAROUSEL (top section) ===== --}}
    <section class="w-full -mt-12 max-w-7xl mx-auto mb-20 z-20 bg-white rounded-[2rem] shadow-lg p-15">
        <div>
            <h1 class="text-blue-900 text-[30px] tracking-tighter uppercase font-bold text-center mb-10">
                Keynotes Speaker of ISMEI
            </h1>

            @if($speakers->isEmpty())
                <div class="text-center py-16 text-black/30 text-sm border border-dashed border-blue-100 rounded-2xl">
                    No keynote speakers added yet.
                </div>
            @else
                <div class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory rounded-2xl no-scrollbar">
                    @foreach($speakers as $speaker)
                        {{-- Clicking a speaker card scrolls/links to their bio below --}}
                        <a href="#speaker-{{ $speaker->id }}"
                            class="min-w-62.5 snap-start shrink-0 group">
                            <div class="relative overflow-hidden rounded-3xl">
                                <img src="{{ $speaker->photo_url }}"
                                    class="w-full h-80 object-cover rounded-3xl transition-transform duration-500 group-hover:scale-105"
                                    alt="{{ $speaker->name }}">

                                <div class="absolute bottom-0 left-0 w-full
                                    bg-blue-900/95 rounded-b-3xl
                                    translate-y-full group-hover:translate-y-0
                                    transition-transform duration-500">
                                    <div class="py-4 px-4 text-center">
                                        <p class="text-white font-semibold text-sm leading-tight">{{ $speaker->name }}</p>
                                        @if($speaker->title)
                                            <p class="text-blue-200 text-xs mt-0.5">{{ $speaker->title }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($speakers->count() > 4)
                    <div class="my-5 text-center">
                        <h3 class="italic text-[#1E3A8A]">
                            *Scroll to see more keynote speakers
                        </h3>
                    </div>
                @endif
            @endif
        </div>
    </section>

    {{-- ===== SPEAKER BIO CARDS (bottom section) ===== --}}
    @if($speakers->isNotEmpty())
        <section class="w-full mx-auto pb-30 bg-white overflow-hidden flex flex-col gap-20">
            @foreach($speakers as $speaker)
                <div id="speaker-{{ $speaker->id }}"
                    class="max-w-7xl mx-auto border rounded-2xl overflow-hidden bg-blue-50 shadow-lg scroll-mt-10">

                    <div class="info-slider flex w-[200%] transition-transform duration-700 ease-in-out">

                        {{-- Profile Panel --}}
                        <div class="w-1/2 flex flex-col {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }} justify-center gap-10 py-10 px-10 items-center">

                            <div class="flex-shrink-0">
                                <img src="{{ $speaker->photo_url }}"
                                    class="object-cover h-120 w-90 border-2 border-blue-900 rounded-2xl shadow-lg"
                                    alt="{{ $speaker->name }}">
                            </div>

                            <div class="max-w-3xl flex flex-col gap-5">
                                <div>
                                    @if($speaker->title)
                                        <p class="text-blue-500 text-sm font-medium uppercase tracking-widest mb-1">{{ $speaker->title }}</p>
                                    @endif
                                    <h2 class="text-[28px] font-bold text-[#1E3A8A] tracking-tighter leading-tight">
                                        {{ $speaker->name }}
                                    </h2>
                                    @if($speaker->institution || $speaker->country)
                                        <p class="text-slate-500 text-sm mt-1">
                                            {{ collect([$speaker->institution, $speaker->country])->filter()->implode(' · ') }}
                                        </p>
                                    @endif
                                </div>

                                @if($speaker->bio)
                                    <div class="text-[17px] font-light text-justify leading-relaxed text-slate-700 max-h-72 overflow-y-auto pr-2">
                                        {!! nl2br(e($speaker->bio)) !!}
                                    </div>
                                @endif

                                @if($speaker->presentation_abstract)
                                    <div class="flex {{ $loop->even ? 'justify-end' : 'justify-start' }}">
                                        <button onclick="toggleSlide(this)"
                                            class="mx-auto flex gap-3 px-6 py-2 rounded-3xl bg-blue-50 border-2 border-blue-900 text-blue-900 cursor-pointer hover:bg-blue-900 hover:text-white transition-all">
                                            <span class="pb-1">See The Keynote Presentation</span>
                                            <i data-feather="chevron-right" class="my-auto"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Presentation Panel --}}
                        <div class="w-1/2 flex flex-col justify-center items-center py-10 px-20 bg-blue-50">
                            <div class="max-w-4xl text-center">
                                <h2 class="text-[28px] font-bold text-[#1E3A8A] mb-2 tracking-tighter">Keynote Presentation</h2>

                                @if($speaker->presentation_title)
                                    <p class="text-blue-600 font-medium text-base mb-6 italic">
                                        "{{ $speaker->presentation_title }}"
                                    </p>
                                @endif

                                @if($speaker->presentation_abstract)
                                    <p class="text-justify font-light text-[17px] leading-relaxed text-slate-700 max-h-96 overflow-y-auto">
                                        {!! nl2br(e($speaker->presentation_abstract)) !!}
                                    </p>
                                @endif

                                <button onclick="toggleSlide(this)"
                                    class="mx-auto flex gap-3 mt-10 px-6 py-2 rounded-3xl border-2 border-blue-900 bg-blue-50 text-blue-900 cursor-pointer hover:bg-blue-900 hover:text-white transition-all">
                                    <i data-feather="chevron-left" class="my-auto"></i>
                                    <span class="pb-1">Back to Profile</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </section>
    @endif

    <script src="{{ asset('js/symposium.js') }}"></script>
</x-layout>