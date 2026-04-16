<x-layout title="Proceeding">
    <section class="bg-blue-900 py-24 relative -z-20 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0 uppercase">ismei</h1>
            <div class="pt-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white uppercase mb-4">archives </h2>
                <p class="font-kaushan text-2xl text-blue-200">"See All The Proceeding & Additional Attachment From The Event"</p>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-white shadow-lg mx-auto p-15 mb-20 rounded-[2rem] -mt-12 z-20 max-w-7xl">
            <div class="max-w-lg mx-auto flex w-full mb-10 justify-center gap-5 text-[17px] p-2 font-medium border rounded-3xl">
                <a href="/archive" class="px-20 py-2 rounded-2xl bg-blue-900 text-white">Proceeding</a>
                <a href="/other-archive" class="px-20 py-2 rounded-2xl bg-white text-blue-900 hover:bg-blue-50 duration-200 transition">Other</a>
            </div>
            <div class="grid grid-cols-2 pt-10 justify-center gap-10">
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
    </section>
</x-layout>