<x-layout title="About Us">
    <section class="bg-blue-900 py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-800 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none tracking-tighter opacity-20 absolute -top-10 left-0">ISMEI</h1>
            <div class="pt-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-4">Discovery & <span class="text-blue-300 italic">Innovation</span></h2>
                <p class="font-kaushan text-2xl text-blue-200">"Redefining Mathematics for the Future"</p>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 pb-32">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col gap-24 -mt-12 relative z-20">
                
                <div class="bg-white p-10 md:p-16 rounded-[2rem] shadow-2xl border border-slate-200">
                    <div class="block">
                        <div class="float-left mr-12 mb-10 w-full md:w-[480px]">
                            <div class="relative p-3 bg-white border border-slate-200 shadow-sm transition-transform duration-500">
                                <img src="../assets/test.jpeg" 
                                     class="object-cover h-[550px] w-full rounded-sm" 
                                     alt="Symposium Event">
                            </div>
                        </div>

                        <h2 class="text-4xl font-black text-slate-900 mb-8 flex items-center gap-4">
                            WHAT IS ISMEI?
                        </h2>
                        
                        <div class="text-[18px] font-light leading-relaxed text-slate-600 space-y-6 text-justify">
                            <p>
                                The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                            </p>

                            <p>
                                This year, as SEAQiM gears up to host the 8th edition of ISMEI, we are proud to announce the collaboration with the SEAMEO Regional Centre for Open and Distance Learning (SEAMOLEC). This partnership underscores our commitment to leveraging technology and open learning platforms to enrich the symposium experience. 
                            </p>

                            <p>
                                The symposium continues to be a vital forum for promoting professional development among teachers and enhancing the quality of mathematics teaching and learning. With a rich history of fostering collaboration and exchanging cutting-edge ideas, ISMEI upholds SEAQiM’s dedication to supporting teacher professionalism and advancing educational excellence in mathematics.
                            </p>

                            <p>
                                Don’t miss this opportunity to contribute to the global dialogue on mathematics education and to take away valuable insights that can be applied in your own classrooms and institutions. Register now and secure your spot at SEAQiM’s most anticipated event of the year! The symposium continues to be a vital forum for promoting professional development among teachers and enhancing the quality of mathematics teaching and learning.
                            </p>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>

                <div class="max-w-7xl mx-auto px-6">
                        
                        <div class="border-b border-slate-100 pb-12">
                            <h1 class="text-[40px] md:text-5xl font-Bold uppercase tracking-tighter text-blue-900 leading-tight">
                                Background & Rationale
                            </h1>
                        </div>

                        <div class="block">
                            
                            <div class="float-right ml-12 mb-10 w-full md:w-5/12">
                                <img src="../assets/test.jpeg" 
                                    class="rounded-2xl w-full h-auto grayscale hover:grayscale-0 transition-all duration-700 shadow-sm" 
                                    alt="Workshop Session">
                            </div>

                            <div class="text-lg font-light leading-relaxed text-slate-600 space-y-6">
                                <p>
                                    The <span class="text-slate-900 font-medium">International Symposium on Mathematics Education and Innovation (ISMEI)</span> is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators and policymakers to discuss innovative practices.
                                </p>
                                
                                <p>
                                    This year, we are proud to announce the collaboration with the <span class="text-slate-900 font-medium">SEAMEO Regional Centre for Open and Distance Learning (SEAMOLEC)</span>. This partnership underscores our commitment to leveraging technology and open learning platforms to enrich the symposium experience.
                                </p>

                                <p>
                                    The symposium continues to be a vital forum for promoting professional development among teachers and enhancing the quality of mathematics teaching and learning. With a rich history of fostering collaboration, ISMEI upholds SEAQiM’s dedication to advancing educational excellence.
                                </p>

                                <p>
                                    Don’t miss this opportunity to contribute to the global dialogue on mathematics education and to take away valuable insights that can be applied in your own institutions.
                                </p>
                            </div>

                        </div>
                </div>
                <div class="flex flex-col md:flex-row gap-8">
                    @for ($i=0;$i<2;$i++)
                    <div class="flex-1 h-64 relative group overflow-hidden rounded-2xl">
                        <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-120" src="{{asset('assets/bg.jpg')}}" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-60"></div>
                        <div class="absolute bottom-6 left-6 text-white font-bold tracking-widest">GALLERY_{{ $i + 1 }}</div>
                    </div>
                    @endfor
                </div>

            </div>
        </div>
    </section>
    <section class="py-15 mb-20 bg-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-6">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="space-y-4">
                    <h2 class="text-5xl font-black text-slate-900 uppercase tracking-tighter">
                        Post Symposium <br> <span class="text-blue-900">Workshop</span>
                    </h2>
                </div>
            </div>

            <div class=" gap-16 items-start flex">
                
                <div class="lg:col-span-7 space-y-8">
                    <div class="prose prose-slate lg:prose-lg max-w-none font-light leading-relaxed text-justify text-slate-600">
                        <p>
                            The International Symposium on Mathematics Education and Innovation (ISMEI) is a prominent biennial event organized by the SEAMEO Regional Centre for QITEP in Mathematics (SEAQiM). Since its inception in 2011, ISMEI has been a pivotal gathering for educators, policymakers, and stakeholders to share and discuss innovative practices in mathematics education.
                            <br><br>  This partnership underscores our commitment to leveraging technology and open learning platforms to enrich the symposium experience. The symposium continues to be a vital forum for promoting professional development among teachers and enhancing the quality of mathematics teaching and learning.
                            <br><br>  With a rich history of fostering collaboration and exchanging cutting-edge ideas, ISMEI upholds SEAQiM’s dedication to supporting teacher professionalism and advancing educational excellence in mathematics.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout>