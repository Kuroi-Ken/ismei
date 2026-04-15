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
                            Meet Our Incredible Guest Speakers.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full pt-30 pb pb-10 bg-[#F8FAFC]">
        <h1 class="text-blue-900 text-[30px] uppercase font-bold text-center">
            Keynotes Speaker of ISMEI
        </h1>
        <div class="max-w-7xl mx-auto p-10 rounded-2xl bg-[blue-200 ]shadow-2xl">
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

    <section class="w-full mx-auto pb-30 bg-[#F8FAFC] overflow-hidden flex flex-col gap-20">
        @for ($i = 0; $i < 4; $i++)
        <div class="max-w-7xl mx-auto border rounded-2xl overflow-hidden bg-blue-50 shadow-lg">
            
            <div class="info-slider flex w-[200%] transition-transform duration-700 ease-in-out">
                
                <div class="w-1/2 flex flex-col {{ $i % 2 != 0 ? 'md:flex-row-reverse' : 'md:flex-row' }} justify-center gap-10 py-10 px-10 items-center">
                    <div class="flex-shrink-0">
                        <img src="../assets/test.jpeg" class="object-cover h-120 w-90 border-2 border-blue-900 rounded-2xl shadow-lg" alt="Profile Image">
                    </div>
                    
                    <div class="max-w-3xl flex flex-col gap-7">
                        <h2 class="text-[30px] font-bold text-[#1E3A8A] text-center">Assoc. Prof. Dr. Thiradet Jiarasuksakun</h2>
                        <div class="">
                            <p class="text-[17px] font-light text-justify leading-relaxed">
                                Thiradet Jiarasuksakun was born in 1977 and grew up in Thailand. He had received Thai scholarship from IPST to study higher education in the US. He finished his Ph.D. in Mathematics from the University of Michigan, Ann Arbor, MI in 2006. After that he started his academic career as a math lecturer in the department of math, faculty of science at King Mongkut’s University of Technology Thonburi (KMUTT) in Bangkok. Two years later he was promoted to the assistant dean of faculty of science at KMUTT. He had produced various publications in math and math education. Then he became the head of math department in 2013, and three years later he was promoted to the dean of faculty of science at KMUTT. As an associate professor in math and a leader in math education, he had a lot of opportunities to enrich math proficiency for math teachers in secondary school level and vocational education. In 2020, he received “Executive of the Year Award” in the field of developing science and math teachers & educators from Foundation for Thai Society due to his dedication in training science and math teachers in Thailand. Then he has been appointed the president of IPST since Sep 2022. He aims to support all Thai science and math teachers to inspire Thai students to enhance their STEAM competencies in the 21st century.
                            </p>
                        </div>
                        <div class="flex {{ $i % 2 != 0 ? 'justify-end' : 'justify-start' }}">
                            <button onclick="toggleSlide(this)" class="mx-auto flex gap-3 px-6 py-2 rounded-3xl bg-blue-50 border-2 border-blue-900 text-blue-900 cursor-pointer hover:bg-blue-900 hover:text-white transition-all">
                                <span class="pb-1">See The Keynote Presentations</span>
                                <i data-feather="chevron-right" class="my-auto"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-1/2 flex flex-col justify-center items-center py-10 px-20 bg-blue-50">
                    <div class="max-w-4xl text-center">
                        <h2 class="text-[30px] font-bold text-[#1E3A8A] mb-6">Keynote Presentations</h2>
                        <p class="text-justify font-light text-[17px] leading-relaxed text-slate-700">
                            Thailand has embarked on a 20-year National Strategy (2018–2037 CE), with the vision of transforming the nation into “ a developed country with security, prosperity and sustainability in accordance with the Sufficiency Economy Philosophy” with the ultimate goal being all Thai people’ s happiness and enduring well- being within the context of a rapidly evolving global environment. A key component of this strategy is the significant advancement in information and communication technology (ICT) infrastructure, which has facilitated broader access to online knowledge resources for Thai population.  
                            Central to this educational advancement is the role of the Institute for the Promotion of Teaching Science and Technology (IPST), a national body charged with the development of Science, Mathematics, and Technology curricula, along with corresponding learning materials and pedagogical strategies in Thailand. The IPST has developed a suite of digital resources specifically for mathematics education, including chatbots, interactive and augmented reality (AR) applications, and instructional kits for softwares such as Geometer's Sketchpad (GSP) and GeoGebra. These educational media are meticulously designed to align with the current National Mathematics Curriculum, aiming to enhance students' competencies in both content knowledge and essential skills. Furthermore, these resources are intended to foster positive attitudes toward mathematics and to improve the learning potential of individuals across all age groups. Through these efforts, Thailand seeks to cultivate a future- ready citizenry equipped with the skills necessary to thrive in a dynamic and uncertain world. 
                            Keywords: Digital Tool, ICT, Mathematics Education, Technology in Education   
                        </p>
                        
                        <button onclick="toggleSlide(this)" class="mx-auto flex gap-3 mt-10 px-6 py-2 rounded-3xl border-2 border-blue-900 bg-blue-50 text-blue-900 cursor-pointer hover:bg-blue-900 hover:text-white transition-all">
                            <i data-feather="chevron-left" class="my-auto"></i>
                            <span class="pb-1">Back to Profile</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        @endfor
    </section>

    <script src="{{ asset('js/symposium.js') }}"></script>
</x-layout>