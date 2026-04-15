<x-layout>
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
                            See All The Proceeding & Additional Attachment From The Event
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto py-20 max-w-6xl">
            <div class="max-w-lg mx-auto flex w-full mb-10 justify-center gap-5 text-[17px] p-2 font-medium border rounded-3xl">
                <a href="/archive" class="px-20 py-2 rounded-2xl bg-white text-blue-900 hover:bg-blue-50 duration-200 transition">Proceeding</a>
                <a href="/other-archive" class="px-20 py-2 rounded-2xl bg-blue-900 text-white ">Other</a>
            </div>
            <div class="flex items-center max-w-6xl mx-auto p-1 bg-white border border-slate rounded-full transition-all">
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
            <div class="flex flex-col pt-10 justify-center gap-10">
                @for ($i=0;$i<3;$i++)
                    <a href="" class="grid gap-3 bg-white shadow-2xl p-8 rounded-2xl border">
                        <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900">Link</h1>
                        <h1 class="text-[30px] font-bold">Archieve Title</h1>
                        <p class="text-[18.75px] pb-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                nostrum perferendis distinctio et consequatur.</p>
                        <div class="flex gap-4 border-t pt-5 ">
                            <i class="size-4.5 my-auto" data-feather="calendar"></i>
                            <p class="font-light">Date Realease</p>
                        </div>
                    </a>
                @endfor
            </div>
            <div class="flex flex-col pt-10 justify-center gap-10">
                @for ($i=0;$i<3;$i++)
                    <div class="gap-3 flex bg-white shadow-2xl p-8 rounded-2xl border">
                        <div class="w-full flex flex-col gap-3">
                            <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900">File</h1>
                            <h1 class="text-[30px] font-bold">Archieve Title</h1>
                            <p class="text-[18.75px] pb-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    nostrum perferendis distinctio et consequatur.</p>
                            <div class="flex gap-8 border-t pt-5 items-center">
                                <div class="flex gap-2">
                                    <i class="size-4.5 my-auto" data-feather="calendar"></i>
                                    <p class="font-light">Date Realease</p>
                                </div>
                                <div class="flex gap-2">
                                    <i class="size-4.5 my-auto" data-feather="download"></i>
                                    <p class="font-light">Size</p>
                                </div>
                            </div>
                        </div>
                        <a href="" class="flex my-auto ml-3 rounded-3xl h-fit px-3 py-2 border justify gap-2 hover:bg-blue-900 hover:text-white transition duration-200">
                            <i data-feather="download"></i>
                            <p>Download</p>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </section>
</x-layout>