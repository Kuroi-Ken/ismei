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
                            Meet our incredible guest speakers.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>