<x-layout title="Hall of Informations">
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

    <section class="bg-white z-20 rounded-4xl p-15 shadow-lg max-w-7xl mx-auto leading-tight -mt-12">
        <h1 class="text-[40px] max-w-7xl mx-auto text-[#1E3A8A] text-center font-bold tracking-tighter pt-5 uppercase">Main Informations</h1>
        <h1 class="text-[25px] max-w-7xl mb-8 mx-auto text-[#1E3A8A] text-center font-light">Stay up-to-date With Our Latest News and Events.</h1>

        <div class="flex flex-col gap-10">
            <div class="w-full mx-auto justify-center gap-10 flex flex-col">
                <div class="flex gap-10 mx-auto">
                    @for ($i =0 ; $i <2 ; $i++)
                    <div class=" shadow-lg border border-blue-50 rounded-2xl max-w-lg hover:-translate-y-2 hover:border-blue-900 transition duration-300">
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
                <div class="flex justify-center gap-10">
                    @for ($i=0;$i<3;$i++)
                        <a href="" class="grid gap-1 bg-white shadow-2xl p-5 rounded-3xl border">
                            <h1 class="bg-[#BEDBFF] text-[11.72px] w-fit py-1 px-5 rounded-lg text-blue-900">Tag</h1>
                            <h1 class="text-[30px] font-bold">Informations Title</h1>
                            <p class="text-[15.75px] pb-3 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    nostrum perferendis distinctio et consequatur.</p>
                            <div class="flex gap-2 border-t pt-2 items-center">
                                <i class="size-3.5 my-auto" data-feather="calendar"></i>
                                <p class="font-light text-[12px]">Date Realease</p>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- poster--}}
    <section class="bg-white flex flex-col my-30 gap-30">
        <div class="flex flex-col gap-12">
            <div class="leading-tight text-center">
                <h1 class="tracking-tighter max-w-7xl mx-auto font-bold text-[40px] text-black uppercase w-full">
                Poster
                    <span class="font-bold text-[40px] text-blue-900 max-w-7xl mx-auto uppercase w-full pb-5">& Pamphlet</span> 
                </h1>
                <h3 class="tracking-tighter max-w-7xl mx-auto font-light text-[25px] text-blue-900 uppercase w-full">Explore Our Official Media</h3>
            </div>
            <div class="flex justify-center gap-10 max-w-7xl w-full mx-auto">
            @for ($i=0;$i<3;$i++)
                <div class="p-3 bg-blue-50">
                    <img class="mx-auto w-90.75 h-140 object-cover shadow-2xl" src="../assets/test.jpeg" alt="">
                </div>
            @endfor
            </div>
        </div>

    </section>

    <section class="bg-white pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-15 leading-tight">
                <h1 class="text-5xl font-black text-blue-900 uppercase tracking-tight mb-4">
                    Announcement
                </h1>
                <div class="flex items-center justify-center gap-4">
                    <h2 class="text-xl font-light text-blue-900 tracking-wide uppercase">
                        Participant Results & Nominations
                    </h2>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @for ($i=0; $i<3; $i++)
                    <a href="#" class="group relative">
                        <div class="absolute inset-0 bg-blue-900 rounded-[2.5rem] translate-y-4 opacity-0 "></div>
                        
                        <div class="relative bg-white border border-slate-100 p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50 flex flex-col items-center text-center transition-all duration-500 group-hover:-translate-y-3 group-hover:border-blue-900">
                            
                            <div class="w-20 h-20 bg-blue-50 text-blue-900 rounded-2xl flex items-center justify-center mb-8  transition-colors duration-500 shadow-inner">
                                <i data-feather="file-text" class="w-10 h-10"></i>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 mb-4">
                                Accepted Abstract
                            </h3>
                            
                            <p class="text-slate-500 leading-relaxed font-light mb-8">
                                Here’s the complete list of all participants whose abstracts have been officially accepted for ISMEI 2026.
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