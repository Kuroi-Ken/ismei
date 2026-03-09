<x-layout class="">
    <section>
        <div class="relative md:py-10 md:pb-30 pt-5 pb-25 px-5 
            bg-linear-to-b from-white to-blue-50
            bg-[radial-gradient(rgba(59,130,246,0.15)_2px,transparent_2px)]
            bg-size-[30px_30px]">
            <div class="w-full max-w-7xl mx-auto">
                <h1 class="md:text-[40px] text-blue-900 text-[20px] font-bold pb-10">
                    Hall of Informations
                </h1>
                <div class="py-5">
                    <h1 class="text-center md:text-[40px] text-[20px] text-blue-900 font-bold">Check Every Our Latest Update Here</h1>
                </div>
                <div class="flex justify-center md:py-7 md:gap-8 gap-2">
                    @for ($i=0;$i<3;$i++)
                        <a href="#" class="border md:text-[25px] text-[11px] md:px-10 md:py-1 px-2 rounded-3xl">
                            Call for Submissions
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8FAFC]">
        <div class="w-full mx-auto max-w-7xl pb-20">
            <h1 class="text-[40px] font-bold text-blue-900 pb-5 pt-20">Call for Submissions</h1>
            <div class="py-7 bg-white shadow-2xl px-10 rounded-2xl">
                <div class="flex gap-15">
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
    </section>

    <section class="bg-[#F8FAFC] pb-20">
        <div class="w-full max-w-7xl mx-auto">
            <h1 class="text-[40px] font-bold pb-10 text-[#1E3A8A]">Announcement</h1>
            <div class="flex mx-auto justify-center gap-20 ">
                @for ($i=0;$i<3;$i++)
                    <a href="#">
                        <div class="grid gap-9 text-center bg-white shadow-2xl max-w-3xs rounded-2xl pb-7">
                            <h2 class="text-[25px] bg-[#BEDBFF] rounded-t-2xl p-10 py-7 font-bold text-[#1E3A8A] leading-tight">
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

    <section class="bg-[#F8FAFC]">
        <div class="w-full mx-auto max-w-7xl pb-20">
            <h1 class="text-[40px] font-bold text-blue-900 pb-5">Schedules</h1>
            <div class="py-7 bg-white shadow-2xl px-10 rounded-2xl">
                <div class="flex gap-15">
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
    </section>

    <section class="bg-[#F8FAFC] pb-20">
        <div class="w-full max-w-7xl mx-auto pb-20">
            <h1 class="text-[40px] text-[#1E3A8A] font-bold pt-5 pb-10 text-center">Additional Informations</h1>
            <div class="flex justify-center gap-10">
                @for ($i=0;$i<3;$i++)
                    <a href="" class="grid gap-3 bg-white shadow-2xl p-5 rounded-3xl">
                        <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900">Tag</h1>
                        <h1 class="text-[30px] font-bold">Informations Title</h1>
                        <p class="text-[18.75px] pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                nostrum perferendis distinctio et consequatur.</p>
                        <div class="flex gap-4 border-t py-2 ">
                            <i class="size-4.5 my-auto" data-feather="calendar"></i>
                            <p class="font-light">Date Realease</p>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>
</x-layout>