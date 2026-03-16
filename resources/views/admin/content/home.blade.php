<x-admin-layout title="Edit Konten Home">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.content.home.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
            <h2 class="text-[18px] font-semibold text-blue-900 mb-1">
                Empowering & 8th ISMEI Theme
            </h2>
            <p class="text-sm text-black/50 mb-5">
                Teks tema utama dan subtitle di halaman home.
            </p>

            <div class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1">Tema Utama (Quote)</label>
                    <textarea
                        name="home_theme_quote"
                        rows="3"
                        class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none"
                        placeholder="Empowering Future Generation through Emerging Technology Trends in Mathematics Education"
                    >{{ $contents['home_theme_quote'] ?? '' }}</textarea>
                    @error('home_theme_quote')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1">Subtitle</label>
                    <input
                        type="text"
                        name="home_theme_subtitle"
                        value="{{ $contents['home_theme_subtitle'] ?? '' }}"
                        class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                        placeholder="8th ISMEI Symposium Theme"
                    >
                    @error('home_theme_subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition">
                    Simpan Teks
                </button>
            </div>
        </div>
    </form>

    <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
        <h2 class="text-[18px] font-semibold text-blue-900 mb-1">
            Gambar "What's New?"
        </h2>
        <p class="text-sm text-black/50 mb-5">
            Kelola gambar slider. Bisa tambah sebanyak apapun, dan hapus yang tidak dipakai.
        </p>

        @if($whatsNewImages->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                @foreach($whatsNewImages as $img)
                    <div class="relative group rounded-xl overflow-hidden border border-blue-100">
                        <img
                            src="{{ asset('storage/' . $img->path) }}"
                            class="w-full h-36 object-cover"
                            alt="Gambar {{ $loop->iteration }}">

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <form action="{{ route('admin.content.whats-new.delete', $img->id) }}" method="POST"
                                onsubmit="return confirm('Hapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-1 transition">
                                    <i data-feather="trash-2" class="w-3.5 h-3.5"></i> Hapus
                                </button>
                            </form>
                        </div>

                        <p class="text-xs text-center text-black/40 py-1 bg-white">
                            Gambar {{ $loop->iteration }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-10 text-black/30 text-sm mb-6 border border-dashed border-blue-100 rounded-xl">
                Belum ada gambar. Upload gambar di bawah.
            </div>
        @endif

        {{-- Form upload gambar baru --}}
        <form action="{{ route('admin.content.whats-new.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border border-blue-100 rounded-xl p-5 bg-blue-50/40">
                <label class="block text-sm font-medium text-blue-900 mb-2">
                    Upload Gambar Baru
                    <span class="text-black/40 font-normal">(bisa pilih lebih dari satu)</span>
                </label>
                <input
                    type="file"
                    name="images[]"
                    accept="image/*"
                    multiple
                    class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white
                           file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                           file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                @error('images')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-black/40 mt-2">Format: JPG, PNG, WebP. Maks 2MB per gambar.</p>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition">
                    Upload Gambar
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>