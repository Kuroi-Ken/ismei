<x-layout class="">
    <section>
        <div class="relative w-full h-100 overflow-hidden">
            <img class="absolute inset-0 w-full h-100 object-cover object-top z-0" src="{{ asset('assets/bg.jpg') }}" alt="">
            <div class="absolute inset-0 bg-black/50 z-10"></div>
            <div class="relative z-20 h-full flex items-center justify-center">
                <div class="text-center px-4">
                    <h1 class="md:text-[70px] text-[20px] text-white font-bold tracking-tight uppercase">
                        {{$title}}
                    </h1>
                    <div class="">
                        <h2 class=" text-white text-xl md:text-[25px]">
                            Everything you need to know, all in one place.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8FAFC] pt-25">
        <h1 class="text-[40px] max-w-7xl mx-auto text-[#1E3A8A] text-center font-bold pt-5 uppercase">Main Informations</h1>
        <h1 class="text-[25px] max-w-7xl mb-8 mx-auto text-[#1E3A8A] text-center font-light">Stay up-to-date With Our Latest News and Events.</h1>

        <div class="flex flex-col gap-10">
            <div class="w-full mx-auto justify-center gap-10 flex flex-col">
                <div class="flex gap-10 mx-auto">
                    @for ($i =0 ; $i <2 ; $i++)
                    <div class=" bg-blue-900 shadow-2xl p-5 rounded-2xl max-w-lg hover:scale-105 transition duration-300">
                        <a href="#" class="my-auto grid grid-rows-3 gap-3 bg-white p-5 rounded-2xl">
                            <h2 class="text-[30px] font-bold">Call for Submissions</h2>
                            <p class="text-[17.63px] max-w-2xl font-light"> Download the template for extended abstract here
                                For details of abstract submission guidelines, please click here 
                            </p>
                            <div class="flex gap-4 border-t">
                                <i data-feather="calendar" class="my-auto w-4 h-4 text-center"></i>
                                <p class="my-auto font-light">Date Realease</p>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="w-full max-w-7xl flex flex-col gap-10 mx-auto">
                <div class="flex items-center w-full mx-auto p-1 bg-white border border-slate-200 rounded-full shadow-lg focus-within:border-blue-900 transition-all">
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
                <div class="flex justify-center gap-10">
                    @for ($i=0;$i<3;$i++)
                        <a href="" class="grid gap-3 bg-white shadow-2xl p-5 rounded-3xl border">
                            <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900">Tag</h1>
                            <h1 class="text-[30px] font-bold">Informations Title</h1>
                            <p class="text-[18.75px] pb-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    nostrum perferendis distinctio et consequatur.</p>
                            <div class="flex gap-4 border-t py-2 ">
                                <i class="size-4.5 my-auto" data-feather="calendar"></i>
                                <p class="font-light">Date Realease</p>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- poster & call --}}
    <section class="bg-[#F8FAFC] flex flex-col gap-30">
        <div class="">
            <h1 class="font-bold text-[40px] text-blue-900 text-center uppercase w-full pt-25 pb-5">
                Poster & Pamphlet
            </h1>
            <div class="flex justify-center gap-10 max-w-7xl w-full mx-auto">
            @for ($i=0;$i<3;$i++)
                <div class="">
                    <img class="mx-auto w-90.75 h-140 object-cover shadow-2xl" src="../assets/test.jpeg" alt="">
                </div>
            @endfor
            </div>
        </div>

    </section>

    <section class="bg-[#F8FAFC] py-30 ">
        <div class="w-full max-w-7xl mx-auto flex flex-col gap-10 ">
            <div class="leading-tight">
                <h1 class="text-[40px] text-center font-bold uppercase text-[#1E3A8A]">Announcement</h1>
                <h2 class="text-[25px] text-center font-light text-blue-900">Check If Your Name is Nominated Here</h2>
            </div>
            <div class="flex mx-auto justify-center gap-20 ">
                @for ($i=0;$i<3;$i++)
                    <a href="#">
                        <div class="grid gap-9 text-center bg-white shadow-2xl max-w-3xs rounded-2xl border pb-7 hover:scale-105 transition duration-300">
                            <h2 class="text-[25px] bg-blue-900 rounded-t-2xl p-10 py-7 font-bold text-white leading-tight">
                                Accepted Abstract
                            </h2>
                            <p class="px-10 leading-tight">
                                Here’s the list of all participants 
                                accepted abstract
                            </p>
                            <i data-feather="chevron-right" class="mx-auto bg-[#BEDBFF] w-10 h-10 rounded-full p-2"></i>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>


</x-layout>