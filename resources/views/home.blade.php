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


    <section class="w-full pb-15">
        <div class="py-15 bg-blue-100 rounded-t-4xl">

            <div class="max-w-7xl mx-auto grid justify-center py-20 border-t border-blue-200">
                <h3 class="max-w-5xl text-center text-[40px] leading-tight font-medium text-blue-900">
                    "Empowering Future Generation through Emerging Technology Trends in Mathematics Education"
                </h3>
                <h4 class="pt-3 text-center text-[25px] text-blue-700">
                    8th ISMEI Symposium Theme
                </h4>
            </div>

            <div class="relative w-full -top-2">
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 grid grid-cols-3 gap-15 max-w-4xl">

                    @for ($i =0 ; $i <3 ; $i++)
                        <div class="p-15 py-10 mx-auto bg-white shadow-2xl rounded-4xl">
                            <i data-feather="user" class="mx-auto text-blue-700 size-10"></i>
                            <h4 class="pt-2 text-[35px] font-bold text-center text-blue-900">300</h4>
                            <h4 class="pt-6 text-[18.75px] text-center text-blue-700 font-medium">
                                Participant
                            </h4>
                        </div>
                    @endfor

                </div>
            </div>

        </div>
    </section>


    <section class="pt-55 py-40 bg-white">
        <div class="w-full">
            <h3 class="text-[40px] text-center font-medium text-blue-900">
                What's New?
            </h3>
        </div>

        <div class="flex justify-center py-10">
            <div class="swiper max-w-6xl rounded-2xl overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/test1.png') }}" class="w-full h-110 object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/Acheron.jpg') }}" class="w-full h-110 object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img3.jpg') }}" class="w-full h-110 object-cover">
                    </div>
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next text-blue-900"></div>
                <div class="swiper-button-prev text-blue-900"></div>
            </div>
        </div>
    </section>


    <section class="w-full bg-blue-100 py-25">
        <div class="max-w-6xl mx-auto pb-25">
            <h2 class="py-5 text-[30px] font-medium text-slate-800">
                What is ISMEI?
            </h2>
            <div class="flex justify-between">
                <div>
                    <img src="../assets/bg.jpg" class="w-120 h-70 object-cover rounded-2xl" alt="">
                </div>
                <div>
                    <p class="max-w-xl py-2 text-[18.75px] leading-relaxed text-justify text-slate-800 pb-5">
                        The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, 
                        policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                    </p>
                    <a href="#" class="w-44 grid items-center h-12 bg-blue-900 text-white text-center rounded-3xl text-xl">
                        Read More
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto py-20">
            <h2 class="py-5 text-[30px] font-medium text-slate-800">
                Background & Rationale
            </h2>
            <div class="flex justify-between">
                <div>
                    <p class="max-w-xl py-2 text-[18.75px] leading-relaxed text-justify text-slate-800 pb-5">
                        The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, 
                        policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                    </p>
                    <a href="#" class="w-44 grid items-center h-12 bg-blue-900 text-white text-center rounded-3xl text-xl">
                        Read More
                    </a>
                </div>
                <div>
                    <img src="../assets/bg.jpg" class="w-120 h-70 object-cover rounded-2xl" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="w-full pt-20">
        <div class="max-w-6xl mx-auto px-6">

            <div class="flex justify-between py-10">
                <h2 class="text-[30px] font-medium text-blue-900">
                    ISMEI Keynotes Speaker
                </h2>

                <a href="#" class="grid items-center w-52 h-12 text-xl text-center text-white bg-blue-900 rounded-3xl hover:bg-blue-800 transition">
                    See More Profile
                </a>
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
                <div class="mt-5 text-center">
                    <h3 class="italic text-[#1E3A8A]">
                        *Scroll to see more keynote speakers
                    </h3>
                </div>
            @endif

        </div>
    </section>

    <section class="w-full py-30">
        <div class="max-w-7xl mx-auto px-10">

            <div class="flex justify-between items-center mb-20">
                <h2 class="text-3xl font-semibold text-blue-900">
                    Schedule & Dates
                </h2>

                <a href="#" class="w-44 grid items-center h-12 bg-blue-900 text-white text-center rounded-3xl text-xl">
                    Read More
                </a>
            </div>

            <div class="relative">
                <div class="absolute top-3 left-0 w-full h-0.5 bg-gray-700"></div>
                <div class="relative flex justify-between">

                    @php
                        $schedules = [
                            ['date' => '12 Jan 2026', 'title' => 'Registration Open'],
                            ['date' => '20 Feb 2026', 'title' => 'Abstract Deadline'],
                            ['date' => '15 Mar 2026', 'title' => 'Notification'],
                            ['date' => '10 Apr 2026', 'title' => 'Full Paper'],
                            ['date' => '01 May 2026', 'title' => 'Final Payment'],
                            ['date' => '20 Jun 2026', 'title' => 'Conference Day'],
                        ];
                    @endphp

                    @foreach ($schedules as $item)
                        <div class="flex flex-col items-center text-center w-32">

                            <div class="w-6 h-6 bg-gray-300 rounded-full z-10 mb-6"></div>

                            <p class="text-blue-500 font-medium text-sm">
                                {{ $item['date'] }}
                            </p>
                            <p class="text-gray-300 text-sm mt-1">
                                {{ $item['title'] }}
                            </p>

                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>

    <section class="pb-30 w-full pt-10">
        <div class="w-full">
            <h1 class="text-center text-[30px] text-[#1E3A8A] max-w-5xl leading-tight mx-auto font-bold">
                Any Question Regarding The Event or Anything About ISMEI? Don’t Hesitate to Ask Here
            </h1>
            <a href="#">
                <i data-feather="phone" class="mx-auto size-15 w-full pt-5 text-[#1E3A8A]"></i>
            </a>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

</x-layout>