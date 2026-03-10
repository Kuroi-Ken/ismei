<header class="z-50 bg-[#F8FAFC] sticky top-0 w-full shadow-sm">
    <div class="h-20 flex items-center justify-between max-w-7xl mx-auto px-6">

        <a href="/" class="rounded-2xl">
            <img 
                class="w-44 md:w-60 rounded-2xl object-cover"
                src="{{ asset('assets/logo.png') }}"
                alt="Logo">
        </a>

        <nav class="hidden md:block">
            <ul class="flex gap-8 text-[15px]">
                <li><a href="/" class="text-[#1E3A8A] hover:text-black">Home</a></li>
                <li><a href="/symposium" class="text-[#1E3A8A] hover:text-black">Symposium</a></li>
                <li><a href="/information" class="text-[#1E3A8A] hover:text-black">Informations</a></li>
                <li><a href="#" class="text-[#1E3A8A] hover:text-black">Post Symposium Workshop</a></li>
                <li><a href="#" class="text-[#1E3A8A] hover:text-black">About</a></li>
            </ul>
        </nav>

        <button id="menu-btn" class="md:hidden">
            <i data-feather="menu" class="w-7 h-7 text-[#1E3A8A]"></i>
        </button>

    </div>
</header>


<div id="overlay"
    class="fixed inset-0 bg-black/40 opacity-0 invisible transition-all duration-500 z-40">
</div>


<div id="sidebar"
    class="fixed top-0 right-0 h-full w-72 bg-white shadow-xl
    transform translate-x-full transition-transform duration-300 z-50">

    <div class="p-6 flex justify-between items-center">

        <h2 class="font-semibold text-lg text-[#1E3A8A]">
            Menu
        </h2>

        <button id="close-btn">
            <i data-feather="x" class="w-6 h-6"></i>
        </button>

    </div>

    <ul class="flex flex-col gap-6 p-6 text-[15px]">

        <li><a href="/" class="text-[#1E3A8A] hover:text-black">Home</a></li>
        <li><a href="#" class="text-[#1E3A8A] hover:text-black">Symposium</a></li>
        <li><a href="/information" class="text-[#1E3A8A] hover:text-black">Informations</a></li>
        <li><a href="#" class="text-[#1E3A8A] hover:text-black">Post Symposium Workshop</a></li>
        <li><a href="#" class="text-[#1E3A8A] hover:text-black">About</a></li>

    </ul>

</div>

<script src="../js/header.js"></script>
<script >
    feather.replace();
</script>