<x-admin-layout title="Dashboard">

    <div class="bg-white rounded-2xl shadow p-7 mx-auto w-full">
        <h2 class="text-[18px] font-semibold text-blue-900 mb-4">Selamat datang di Admin Panel ISMEI</h2>
        <p class="text-sm text-black/60 leading-relaxed">
            Gunakan menu navigasi di sebelah kiri untuk mengelola konten website.
        </p>
    </div>

    {{-- Menu Kelola Konten --}}
    <div class="bg-white rounded-2xl shadow p-7 mt-5 mx-auto w-full">
        <h2 class="text-[18px] font-semibold text-blue-900 mb-5">
            Kelola Konten
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Card: Edit Konten Home --}}
            <a href="{{ route('admin.content.home') }}"
               class="flex items-center gap-4 border border-blue-100 hover:border-blue-400 hover:bg-blue-50 transition rounded-xl p-5 group">
                <div class="bg-blue-100 group-hover:bg-blue-200 transition rounded-xl p-3">
                    <i data-feather="edit-2" class="w-6 h-6 text-blue-900"></i>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold text-blue-900">Edit Konten Home</h3>
                    <p class="text-xs text-black/50 mt-0.5">Theme, subtitle & gambar What's New</p>
                </div>
            </a>

            {{-- Card placeholder — bisa ditambah nanti --}}
            <div class="flex items-center gap-4 border border-dashed border-blue-100 rounded-xl p-5 opacity-40 cursor-not-allowed">
                <div class="bg-blue-50 rounded-xl p-3">
                    <i data-feather="info" class="w-6 h-6 text-blue-900"></i>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold text-blue-900">Informations</h3>
                    <p class="text-xs text-black/50 mt-0.5">Coming soon</p>
                </div>
            </div>

            <div class="flex items-center gap-4 border border-dashed border-blue-100 rounded-xl p-5 opacity-40 cursor-not-allowed">
                <div class="bg-blue-50 rounded-xl p-3">
                    <i data-feather="sunset" class="w-6 h-6 text-blue-900"></i>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold text-blue-900">Symposium</h3>
                    <p class="text-xs text-black/50 mt-0.5">Coming soon</p>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-7 mt-5 mx-auto w-full">
        <h1 class="text-[18px] font-semibold text-blue-900">
            Theme Descriptions
        </h1>
        <div class=""></div>
    </div>

</x-admin-layout>