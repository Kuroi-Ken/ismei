<x-layout>

    <section>
        <div class="relative md:py-10 py-25
            bg-linear-to-b bg-[#F8FAFC]
            bg-[radial-gradient(rgba(59,130,246,0.15)_2px,transparent_2px)]
            bg-size-[30px_30px]">

            <div class="relative z-10 flex flex-col items-center justify-center w-full p-20 py-7">

                <div class="flex justify-center w-full">
                    <h1 class="max-w-5xl text-center md:text-[40px] leading-11 font-bold text-blue-900">
                        Welcome To The International Symposium on Mathematics Education and Innovation <br> (ISMEI)
                    </h1>
                </div>
                <div class=" mx-auto grid justify-center pt-5">
                    <h3 class="max-w-5xl text-center text-[25px] leading-tight font-light text-blue-900">
                        "{{ \App\Models\SiteContent::get('home_theme_quote', 'Empowering Future Generation through Emerging Technology Trends in Mathematics Education') }}"
                    </h3>
                    <h4 class="text-center font-light text-[25px] text-blue-900">
                        {{ \App\Models\SiteContent::get('home_theme_subtitle', '8th ISMEI Symposium Theme') }}
                    </h4>
                </div>

                <div class="flex justify-between md:gap-10 gap-5 md:py-10 mx-auto">
                    @for ($i=0; $i<3; $i++)
                        <div class="py-2">
                            <img class="w-20.5 h-20.5 md:w-32.5 md:h-32.5 mx-auto object-cover" src="../assets/seameo.png" alt="">
                            <h3 class="pt-3 md:text-xl text-center text-blue-900">SEAMEO</h3>
                        </div>
                    @endfor
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


    <section class="z-10 inset-0 bg-white relative pt-20">
        {{-- <div class=" bg-blue-200 w-full h-30"></div> --}}
        <div class="w-full">
            <h3 class="text-[40px] uppercase text-center font-bold text-blue-900">
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
        <div class="flex items-center justify-center ">
            <div class="w-full">
                <div class="max-w-2xl mx-auto">
                    <div class="flex justify-between max-w-6xl mx-auto">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="pt-5">
                                <h4 class="text-[60px] font-kaushan font-bold text-center text-blue-900">
                                    300
                                </h4>
                                <h4 class="text-[17.63px] text-center font-light">
                                    Participant
                                </h4>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="flex flex-col gap-15">
            <div class="text-center">
                <h1 class="uppercase text-blue-900 font-bold text-[40px] ">Informations</h1>
                <h3 class="text-[20.75px] font-light text-blue-900">Keep yourself up-to-date so you don't miss any of our updates</h3>
            </div>
            <div class="flex w-fit gap-18 m-auto">
                <div class="max-w-xl flex flex-col gap-12">
                    <div class="flex flex-col">
                        <h1 class="text-[30px] font-bold text-blue-900">Call For Submissions</h1>
                        <h3 class="text-[17.63px] font-light text-blue-900">We invite submissions of the original and unpublished work to the symposium for review. Only scholarly work that has not been published elsewhere should be submitted for consideration.  The followings are the topics:</h3>
                    </div>
                    <a class="text-[20px] border text-[#1F2937] px-5 py-1 w-fit rounded-3xl shadow-xl" href="">See More</a>
                </div>
                <div class="my-auto">
                    <img class="w-80 h-50 object-cover rounded-xl" src="{{ asset('assets/info.svg') }}" alt="">
                </div>
            </div>
            <div class="flex mx-auto max-w-7xl gap-10">
                @for ($i = 0; $i < 2; $i++)
                <a href="" class="bg-blue-900 max-w-lg px-11 py-9 rounded-xl">
                    <div class="flex gap-3">
                        <div class="text-white flex flex-col gap-1">
                            <h1 class="font-bold text-[30px]">Announcement</h1>
                            <h3 class="text-[17.63px] font-light max-w-md leading-5">See all the accepted abstract, participant, and grant awardee during or after the event here</h3>
                        </div>
                        <i class="m-auto size-12 text-white" data-feather="chevron-right"></i>
                    </div>
                </a>
                @endfor
            </div>
        </div>
    </section>

    <section class="w-full py-30">
        <div class="max-w-7xl mx-auto p-10 rounded-2xl bg-[blue-200 ]shadow-2xl">

            <div class="flex w-full pb-10">
                <div class="w-full flex flex-col ">
                    <h2 class="text-[30px] font-bold uppercase text-blue-900">
                        ISMEI Keynotes Speaker
                    </h2>
                    <h3 class="text-[20.75px] font-light text-blue-900">
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

    <section class="w-full">

        <div class="min-h-screen flex flex-col items-center justify-center px-5">

            <h1 class="text-center text-blue-900 text-[40px] font-bold pb-2">
                Contact Us
            </h1>

            <h3 class="text-center text-[20px] text-[#1E3A8A] max-w-5xl leading-tight pb-8">
                Any Question Regarding The Event or Anything About ISMEI? Don’t Hesitate to Ask Here
            </h3>

            <div class="flex gap-5 justify-center">

                <a href="#" class="w-44 h-10 flex items-center justify-center bg-blue-900 text-white rounded-3xl text-xl">
                    Email
                </a>

                <a href="#" class="w-44 h-10 flex items-center justify-center bg-blue-900 text-white rounded-3xl text-xl">
                    WhatsApp
                </a>

            </div>

        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

</x-layout>