<x-layout>

    <section>
        <div class="relative md:py-5 py-25
            bg-linear-to-b from-white to-blue-50
            bg-[radial-gradient(rgba(59,130,246,0.15)_2px,transparent_2px)]
            bg-size-[30px_30px]">

            <div class="relative z-10 flex flex-col items-center justify-center w-full p-20">

                <div class="flex justify-center w-full">
                    <h1 class="max-w-5xl text-center md:text-[40px] leading-tight font-bold text-blue-900">
                        Welcome To The International Symposium on Mathematics Education and Innovation <br> (ISMEI)
                    </h1>
                </div>

                <div class="flex justify-between md:gap-10 gap-5 md:py-10 py-5 mx-auto">
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
                    <a href="#" class="grid items-center w-30 h-8 md:w-44 md:h-12 md:text-xl text-center text-blue-900 bg-white border border-blue-900 rounded-3xl hover:bg-blue-50 transition">
                        Read More
                    </a>
                </div>

            </div>
        </div>
    </section>


    <section class="w-full z-10 inset-0">
        <div class="py-15 bg-white rounded-t-4xl">

            <div class="max-w-7xl mx-auto grid justify-center pt-20 border-t border-blue-200">
                <h3 class="max-w-5xl text-center text-[40px] leading-tight font-medium text-blue-900">
                    "{{ \App\Models\SiteContent::get('home_theme_quote', 'Empowering Future Generation through Emerging Technology Trends in Mathematics Education') }}"
                </h3>
                <h4 class="pt-3 text-center text-[25px] text-blue-700">
                    {{ \App\Models\SiteContent::get('home_theme_subtitle', '8th ISMEI Symposium Theme') }}
                </h4>
            </div>

        </div>
    </section>


    <section class="z-10 inset-0 bg-white relative">
        {{-- <div class=" bg-blue-200 w-full h-30"></div> --}}a
        <div class="w-full">
            <h3 class="text-[40px] text-center font-bold text-blue-900">
                What's New?
            </h3>
        </div>

        <div class="flex justify-center py-15">
            <div class="swiper max-w-6xl rounded-2xl overflow-hidden z-10">
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
        <div class="absolute bottom-0 bg-[#BEDBFF] w-full h-70 -z-10"></div>
    </section>


    <section class="w-full pt-40">
        <h1 class="w-full text-center text-[40px] text-blue-900 font-bold ">
            About Us
        </h1>
        <h3 class="text-[20px] text-center text-blue-900 pb-15">
            Check our Profile and Background to Know More About ISMEI
        </h3>
        <div class="flex justify-center gap-10">
            <div class="max-w-2xl border p-7 rounded-2xl bg-[#F8FAFC] shadow-2xl">
                <h2 class="pb-5 text-[30px] font-medium text-blue-900">
                    What is ISMEI?
                </h2>
                <div class="flex justify-between">
                    <div>
                        <p class="max-w-2xl py-2 text-[18.75px] leading-relaxed text-justify text-slate-800 pb-5">
                            The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, 
                            policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                        </p>
                        <a href="#" class="w-44 grid items-center h-10 bg-blue-900 text-white text-center rounded-3xl text-xl">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="max-w-2xl p-5 shadow-2xl rounded-2xl border">
                <h2 class=" text-[30px] font-medium text-slate-800">
                    Background & Rationale
                </h2>
                <div class="flex justify-between">
                    <div>
                        <p class="max-w-2xl py-2 text-[18.75px] leading-relaxed text-justify text-slate-800 pb-5">
                            The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, 
                            policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                        </p>
                        <a href="#" class="w-44 grid items-center h-10 bg-blue-900 text-white text-center rounded-3xl text-xl">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">

        <div class="min-h-[150vh] flex items-center justify-center ">

            <div class="w-full">

                <h1 class="text-center text-blue-900 text-[40px] font-bold mb-15">
                    Register and Join Us
                </h1>

                <div class="max-w-7xl mx-auto">

                    <div class="flex justify-between max-w-6xl mx-auto">

                        @for ($i = 0; $i < 3; $i++)

                            <div class="pt-5">

                                <h4 class="pt-6 text-[25px] text-center font-normal">
                                    Participant
                                </h4>

                                <h4 class="text-[100px] font-bold text-center text-blue-900">
                                    300
                                </h4>
                                <h4 class="text-center text-[20px] font-normal">
                                    Here's Total the ISMEI Participant 
                                </h4>

                            </div>

                        @endfor

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="w-full">
        <div class="max-w-7xl mx-auto p-10 border rounded-2xl bg-[blue-200 ]shadow-2xl">

            <div class="w-full mx-auto pb-10">
                <h2 class="text-[40px] text-center font-bold text-blue-900">
                    ISMEI Keynotes Speaker
                </h2>
            </div>

            @php $total = 5; @endphp

            <div class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar">

                @for ($i=0; $i < $total; $i++)
                    <div class="min-w-62.5 snap-start shrink-0">
                        <div class="relative overflow-hidden rounded-3xl group">

                            <img src="./assets/test.jpeg"
                                class="w-full h-80 object-cover rounded-3xl transition-transform duration-500 group-hover:scale-105">

                            <div class="absolute bottom-0 left-0 w-full
                                bg-blue-900/80 backdrop-blur-sm
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
            <a href="#" class="mx-auto grid items-center w-52 h-10 text-xl text-center text-white bg-blue-900 rounded-3xl hover:bg-blue-800 transition">
                See More Profile
            </a>

        </div>
    </section>

    <section class="w-full mt-40 mx-auto max-w-7xl">
        <div class="max-w-7xl mx-auto px-10">
            <h2 class="text-3xl text-[40px] text-center font-bold text-blue-900 pb-10">
                Hall of Informations
            </h2>
        </div>
        <div class="">
            <div class="w-full mx-auto max-w-7xl pb-10">
                <div class="py-7 max-w-5xl border bg-white shadow-2xl mx-auto px-10 rounded-2xl">
                    <div class="flex gap-15 ">
                        <div class="">
                            <img src="../assets/bg.jpg" class="w-md h-65 object-cover rounded-2xl" alt="">
                        </div>
                        <a href="#" class="my-auto grid grid-rows-3 gap-5">
                            <h2 class="text-[30px] font-bold">Call for Submissions</h2>
                            <p class="text-[15.63px] max-w-2xl"> Download the template for extended abstract here
                                For details of abstract submission guidelines, please click here 
                            </p>
                            <div class="flex gap-4 pt-5">
                                <i data-feather="calendar" class="my-auto w-4 h-4 text-center"></i>
                                <p class="my-auto font-light">Date Realease</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h3></h3>
        <div class="flex gap-5 max-w-6xl py-5 justify-center mx-auto">
            <a href="#" class="w-50 grid items-center h-11 bg-blue-900 text-white text-center rounded-3xl text-xl">
                Schedule
            </a>
            <a href="#" class="w-50 grid items-center h-11 bg-blue-900 text-white text-center rounded-3xl text-xl">
                Announcement
            </a>
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