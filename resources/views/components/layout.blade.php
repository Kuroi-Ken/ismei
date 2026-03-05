<!doctype html>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            transition: ease-in-out 200ms;
            color: white !important;
            /* text-shadow: 0 0 10px rgba(255,255,255,0.7); */
        }

        .swiper-button-next,
        .swiper-button-prev {
            transition: ease-in-out 200ms;
            color: black !important;
            /* text-shadow: 0 0 10px rgba(255,255,255,0.7); */
        }

        .swiper-pagination-bullet {
            background: black !important;
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            background: white !important;
            opacity: 1;
        }
        .no-scrollbar::-webkit-scrollbar {
        display: none;
        }
        .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
        }
</style>

</head>
<body class="relative">
    <div class="min-h-full">

    {{-- header --}}
    <x-header></x-header>

    {{ $slot }}
    <div class="fixed bg-black p-3 rounded-2xl z-100 bottom-0 right-0 m-10">
        <a href="#" class="">
            <i data-feather="chevron-up" class="md:w-8 md:h-8 text-[#F8FAFC]"></i>
        </a>
    </div>
    <x-footer class="relative">
        {{ $slot }}
    </x-footer>
    </div>

    <script>
        feather.replace();
    </script>
</body>
  
</html>