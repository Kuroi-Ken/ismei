<x-layout title="ISMEI Homepage">

    <section>
        <div class="relative md:py-10 py-25
            bg-linear-to-b bg-[#F8FAFC]
            bg-[radial-gradient(rgba(59,130,246,0.15)_2px,transparent_2px)]
            bg-size-[30px_30px]">

            <div class="relative z-10 flex flex-col items-center justify-center w-full p-20 py-5">

                <div class="flex justify-center w-full">
                    <h1 class="max-w-5xl text-center md:text-[40px] leading-11 font-bold uppercase text-blue-900">
                        Welcome To The International Symposium on Mathematics Education and Innovation <br> (ISMEI)
                    </h1>
                </div>
                <div class=" mx-auto justify-center pt-8 flex flex-col gap-3 ">
                    <h4 class="text-center rounded-3xl bg-blue-900 w-fit mx-auto px-5 py-1 font-medium text-[20px] text-white">
                        {{ \App\Models\SiteContent::get('home_theme_subtitle', '8th ISMEI Symposium Theme') }}
                    </h4>
                    <h3 class="max-w-5xl text-center text-[25px] leading-tight font-light text-blue-900">
                        "{{ \App\Models\SiteContent::get('home_theme_quote', 'Empowering Future Generation through Emerging Technology Trends in Mathematics Education') }}"
                    </h3>
                </div>

                @php
                    $partnerLogos = \App\Models\PartnerLogo::orderBy('order')->orderBy('id')->get();
                @endphp
                
                <div class="flex justify-center md:gap-10 gap-5 md:py-10 mx-auto flex-wrap">
                    @forelse($partnerLogos as $logo)
                        <div class="py-2 flex flex-col items-center">
                            <img class="w-20 h-20 md:w-32 md:h-32 object-contain mx-auto"
                                src="{{ asset('storage/' . $logo->path) }}"
                                alt="{{ $logo->name ?? 'Partner Logo' }}">
                            @if($logo->name)
                                <h3 class="pt-3 md:text-xl text-center uppercase font-medium text-blue-900">{{ $logo->name }}</h3>
                            @endif
                        </div>
                    @empty
                        {{-- Fallback jika belum ada logo di database --}}
                        @for($i = 0; $i < 3; $i++)
                            <div class="py-2">
                                <img class="w-20 h-20 md:w-32 md:h-32 mx-auto object-cover"
                                    src="{{ asset('assets/seameo.png') }}" alt="SEAMEO">
                                <h3 class="pt-3 md:text-xl text-center text-blue-900">SEAMEO</h3>
                            </div>
                        @endfor
                    @endforelse
                </div>
                

                <div class="flex gap-7 md:gap-10">
                    <a href="#" class="grid items-center w-30 h-8 md:w-44 md:h-12 md:text-xl text-center text-white rounded-3xl bg-blue-900 hover:bg-blue-800 transition">
                        Registration
                    </a>
                    <a href="#" class="grid items-center w-30 h-8 md:w-44 md:h-12 md:text-xl text-center text-blue-900 bg-white border-2 border-blue-900 rounded-3xl hover:bg-blue-50 transition">
                        Read More
                    </a>
                </div>

            </div>
        </div>
    </section>


    <section class="z-10 inset-0 bg-white relative pt-20 ">
        <div class="w-full">
            <h3 class="text-[40px] uppercase text-center font-bold tracking-tighter text-blue-900">
                What's New?
            </h3>
        </div>

        <div class="flex justify-center py-8">
            <div class="swiper max-w-5xl rounded-2xl overflow-hidden z-10 border-2 shadow-2xl">
                <div class="swiper-wrapper">

                    @php
                        $whatsNewImages = \App\Models\WhatsNewImage::orderBy('order')->orderBy('id')->get();
                    @endphp

                    @if($whatsNewImages->count() > 0)
                        @foreach($whatsNewImages as $img)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $img->path) }}" class="w-full h-110 object-cover">
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next text-blue-900"></div>
                <div class="swiper-button-prev text-blue-900"></div>
            </div>
        </div>
    </section>


    <section class="w-full flex flex-col py-40 gap-10 ">
        <div class="flex flex-col gap-8">
            <h1 class="w-full text-center text-[30px] font-kaushan text-blue-900 ">
                What is ISMEI?
            </h1>
            <h3 class="text-[17.63px] font-light leading-10 text-center max-w-3xl mx-auto text-[#1F2937]">
                The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
            </h3>
        </div>
        <div class="">
            <div class="flex justify-between max-w-3xl mx-auto">
    
                <div class="pt-5">
                    <h4 class="text-[60px] font-kaushan font-bold text-center text-blue-900">
                        300
                    </h4>
                    <h4 class="text-[20.63px] uppercase text-center font-medium">
                        Participants
                    </h4>
                </div>

                <div class="pt-5">
                    <h4 class="text-[60px] font-kaushan font-bold text-center text-blue-900">
                        {{ \App\Models\SiteContent::get('home_stat2_value', '50') }}
                    </h4>
                    <h4 class="text-[20.63px] uppercase text-center font-medium">
                        {{ \App\Models\SiteContent::get('home_stat2_label', 'Countries') }}
                    </h4>
                </div>
    
                <div class="pt-5">
                    <h4 class="text-[60px] font-kaushan font-bold text-center text-blue-900">
                        {{ \App\Models\SiteContent::get('home_stat3_value', '20') }}
                    </h4>
                    <h4 class="text-[20.63px] uppercase text-center font-medium">
                        {{ \App\Models\SiteContent::get('home_stat3_label', 'Sessions') }}
                    </h4>
                </div>
    
            </div>
        </div>
    </section>

    <section class="w-full bg-blue-50">
        <div class="flex flex-col py-15 gap-15">
            <div class="text-center">
                <h1 class="uppercase text-blue-900 font-bold tracking-tighter text-[40px] ">Informations</h1>
                <h3 class="text-[20.75px] uppercase font-light text-blue-900">Keep yourself up-to-date so you don't miss any of our updates</h3>
            </div>
            <div class="flex w-fit gap-18 m-auto">
                <div class="max-w-xl flex flex-col gap-12">
                    <div class="flex flex-col">
                        <h1 class="text-[30px] font-bold tracking-tighter uppercase text-blue-900">Call For Submissions</h1>
                        <h3 class="text-[17.63px] font-light text-blue-900">We invite submissions of the original and unpublished work to the symposium for review. Only scholarly work that has not been published elsewhere should be submitted for consideration.  The followings are the topics:</h3>
                    </div>
                    <a class="text-[20px] flex items-center gap-1 hover:gap-3 duration-200 text-blue-900 px-5 py-1 w-fit" href="">
                        <span>See More</span>
                        <i data-feather="arrow-right" class="pt-1"></i>
                    </a>
                </div>
                <div class="my-auto">
                    <img class="w-80 h-50 object-cover rounded-xl" src="{{ asset('assets/info.svg') }}" alt="">
                </div>
            </div>
            <div class="flex mx-auto max-w-7xl gap-10">
                @for ($i = 0; $i < 2; $i++)
                    <a href="" class="group block max-w-lg bg-blue-900 hover:bg-white border border-blue-900 rounded-xl px-11 py-9 transition-all duration-400 hover:-translate-y-2">
                        <div class="flex gap-3 items-center">
                            <div class="flex flex-col gap-1">
                                <h1 class="font-bold tracking-tighter uppercase text-[30px] text-white group-hover:text-blue-900 transition-colors">
                                    Announcement
                                </h1>
                                <h3 class="text-[17.63px] font-light max-w-md leading-5 text-white group-hover:text-blue-900 transition-colors">
                                    See all the accepted abstract, participant, and grant awardee during or after the event here
                                </h3>
                            </div>
                            <i class="size-12 text-white group-hover:text-blue-900 transition-colors ml-auto" data-feather="chevron-right"></i>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>



    <section class="w-full mt-20">
        <div class="max-w-7xl mx-auto p-10 rounded-2xl bg-[blue-200 ]shadow-2xl">

            <div class="flex w-full pb-10">
                <div class="w-full flex flex-col ">
                    <h2 class="text-[30px] font-bold uppercase tracking-tighter text-blue-900">
                        ISMEI Keynotes Speaker
                    </h2>
                    <h3 class="text-[20.75px] uppercase font-light text-blue-900">
                        Introducing the speakers for the on-going event
                    </h3>
                </div>
                <a href="#" class="my-auto py-1 w-45 h-10 text-xl text-center text-white bg-blue-900 rounded-3xl hover:bg-blue-800 transition">
                    See More 
                </a>
            </div>

            @php $total = 5; @endphp

            <div class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory rounded-2xl no-scrollbar">

                @for ($i=0; $i < $total; $i++)
                    <div class="min-w-62.5 snap-start shrink-0 ">
                        <div class="relative overflow-hidden rounded-3xl group">

                            <img src="./assets/test.jpeg"
                                class="w-full h-80 object-cover rounded-3xl transition-transform duration-500 group-hover:scale-105">

                            <div class="absolute bottom-0 left-0 w-full
                                bg-blue-900/95 rounded-b-3xl
                                translate-y-full group-hover:translate-y-0
                                transition-transform duration-500">

                                <h4 class="py-5 text-center text-white font-medium">
                                    Faiz Nur Ramadhan
                                </h4>
                            </div>

                        </div>
                    </div>
                @endfor
            </div>

            @if ($total > 4)
                <div class="my-5 text-center">
                    <h3 class="italic text-[#1E3A8A]">
                        *Scroll to see more keynote speakers
                    </h3>
                </div>
            @endif

        </div>
    </section>

    <section class="bg-blue-50">
        <div class="max-w-7xl mx-auto py-30 px-10 ">
            <div class="flex w-full">
            <div class="w-full flex flex-col ">
                <h2 class="text-[30px] font-bold uppercase tracking-tighter text-blue-900">
                    Proceeding <span class="text-[30px] font-bold uppercase tracking-tighter text-black">& Other Archives</span>
                </h2>
                <h3 class="text-[20.75px] font-light text-blue-900 uppercase">
                    See All The Proceeding & Additional Attachment From The Event
                </h3>
            </div>
            <a href="#" class="my-auto py-1 w-45 h-10 text-xl text-center text-white bg-blue-900 rounded-3xl hover:bg-blue-800 transition">
                See More 
            </a>
            </div>
            <div class="grid grid-cols-3 pt-10 justify-center gap-10">
            @for ($i=0;$i<3;$i++)
                <a href="" class="grid gap-3 bg-white shadow-2xl p-5 rounded-2xl border border-blue-50 hover:-translate-y-4 hover:border-blue-900 duration-400 transition-all">
                    <h1 class="bg-[#BEDBFF] text-[9.72px] w-fit py-1 px-5 rounded-lg text-blue-900">Link</h1>
                    <h1 class="text-[30px] font-bold">Archieve Title</h1>
                    <p class="text-[14.75px] pb-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            nostrum perferendis distinctio et consequatur.</p>
                    <div class="flex gap-4 border-t pt-5 ">
                        <i class="size-4.5 my-auto" data-feather="calendar"></i>
                        <p class="text-[13.75px] font-light">Date Realease</p>
                    </div>
                </a>
            @endfor
            </div>
        </div>
    </section>

    <section class="py-32 bg-blue-900 relative overflow-hidden text-center">
        <div class="relative z-10 px-6">
            <h2 class="text-5xl md:text-6xl font-black text-white uppercase tracking-tighter mb-6">Have Questions?</h2>
            <p class="text-xl text-blue-200 font-light max-w-2xl mx-auto mb-12">
                Our team is ready to assist you regarding the event or any collaboration inquiries.
            </p>
            <div class="flex justify-center gap-6">
                <a href="#" class="px-10 py-4 bg-white text-blue-900 rounded-2xl font-black hover:scale-105 transition-transform flex items-center gap-2">
                    <i data-feather="mail"></i> Email Us
                </a>
                <a href="#" class="px-10 py-4 border-2 border-white text-white rounded-2xl font-black hover:bg-white hover:text-blue-900 transition-all flex items-center gap-2">
                    <i data-feather="message-circle"></i> WhatsApp
                </a>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

</x-layout>