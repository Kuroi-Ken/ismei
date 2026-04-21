<x-admin-layout title="Edit Home Content">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Home Page Content</h1>
        <p class="text-sm text-black/40 mt-1">Manage and update content displayed on the homepage.</p>
    </div>

    {{-- ===== HEADER LOGO ===== --}}
    <form action="{{ route('admin.content.header-logo.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
            <div class="flex items-start gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="layout" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Header Logo</h2>
                    <p class="text-sm text-black/50">The logo shown in the navigation bar across all pages.</p>
                </div>
            </div>

            <div class="flex items-center gap-6">
                {{-- Current logo preview --}}
                <div class="flex-shrink-0 w-48 h-16 bg-gray-50 border border-blue-100 rounded-xl flex items-center justify-center px-3 overflow-hidden">
                    @php
                        $headerLogoPath = $contents['header_logo'] ?? null;
                    @endphp
                    @if($headerLogoPath)
                        <img src="{{ asset('storage/' . $headerLogoPath) }}"
                            class="max-h-full max-w-full object-contain"
                            alt="Current Header Logo">
                    @else
                        {{-- Fallback: show current static logo --}}
                        <img src="{{ asset('assets/logo.png') }}"
                            class="max-h-full max-w-full object-contain"
                            alt="Default Header Logo">
                    @endif
                </div>

                <div class="flex-1">
                    <label class="block text-sm font-medium text-blue-900 mb-2">Upload New Header Logo</label>
                    <input type="file" name="header_logo" accept="image/*"
                        class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white
                               file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                               file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                    @error('header_logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-black/40 mt-2">
                        Supported: JPG, PNG, WebP, SVG. Max 3MB.
                        Recommended: transparent PNG or SVG, wide format (e.g. 400×100px).
                    </p>
                </div>
            </div>

            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="upload" class="w-4 h-4"></i> Update Header Logo
                </button>
            </div>
        </div>
    </form>

    {{-- ===== THEME TEXT ===== --}}
    <form action="{{ route('admin.content.home.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
            <div class="flex items-start gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="type" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Theme Text</h2>
                    <p class="text-sm text-black/50">Main quote and subtitle shown on the homepage hero section.</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1">Main Quote</label>
                    <textarea name="home_theme_quote" rows="3"
                        class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none"
                        placeholder="Empowering Future Generation through Emerging Technology Trends in Mathematics Education"
                    >{{ $contents['home_theme_quote'] ?? '' }}</textarea>
                    @error('home_theme_quote') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1">Subtitle</label>
                    <input type="text" name="home_theme_subtitle"
                        value="{{ $contents['home_theme_subtitle'] ?? '' }}"
                        class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                        placeholder="8th ISMEI Symposium Theme">
                    @error('home_theme_subtitle') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i> Save Changes
                </button>
            </div>
        </div>
    </form>

    {{-- ===== PARTNER LOGOS ===== --}}
    <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
        <div class="flex items-start gap-3 mb-5">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                <i data-feather="award" class="w-5 h-5"></i>
            </div>
            <div>
                <h2 class="text-[18px] font-semibold text-blue-900">Partner Logos</h2>
                <p class="text-sm text-black/50">Upload up to 3 partner logos shown on the homepage hero. Label each one and delete individually.</p>
            </div>
        </div>

        @php $logoCount = $partnerLogos->count(); @endphp

        <div class="grid grid-cols-3 gap-4 mb-6">
            @foreach($partnerLogos as $logo)
                <div class="border border-blue-100 rounded-xl p-4 bg-blue-50/30 flex flex-col gap-3">
                    <div class="flex items-center justify-center h-24 bg-white rounded-xl border border-blue-100 p-3">
                        <img src="{{ asset('storage/' . $logo->path) }}"
                            class="max-h-full max-w-full object-contain"
                            alt="{{ $logo->name ?? 'Partner Logo' }}">
                    </div>
                    <form action="{{ route('admin.content.logos.update-name', $logo->id) }}" method="POST" class="flex gap-2">
                        @csrf @method('PATCH')
                        <input type="text" name="name" value="{{ $logo->name ?? '' }}" placeholder="e.g. SEAMEO"
                            class="flex-1 min-w-0 text-xs border border-blue-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <button type="submit" class="px-3 py-1.5 bg-blue-900 text-white text-xs rounded-lg hover:bg-blue-800 transition flex-shrink-0">Save</button>
                    </form>
                    <form action="{{ route('admin.content.logos.delete', $logo->id) }}" method="POST" onsubmit="return confirm('Delete this logo?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full py-1.5 bg-red-50 text-red-600 text-xs rounded-lg hover:bg-red-600 hover:text-white transition flex items-center justify-center gap-1">
                            <i data-feather="trash-2" class="w-3 h-3"></i> Delete
                        </button>
                    </form>
                </div>
            @endforeach

            @for($i = $logoCount; $i < 3; $i++)
                <div class="border-2 border-dashed border-blue-100 rounded-xl h-40 flex flex-col items-center justify-center gap-2 text-black/20">
                    <i data-feather="image" class="w-6 h-6"></i>
                    <span class="text-xs">Slot {{ $i + 1 }} empty</span>
                </div>
            @endfor
        </div>

        @if($logoCount < 3)
            @php $slotsLeft = 3 - $logoCount; @endphp
            <form action="{{ route('admin.content.logos.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="border border-blue-100 rounded-xl p-5 bg-blue-50/40">
                    <label class="block text-sm font-medium text-blue-900 mb-3">
                        Upload New Logo(s)
                        <span class="text-black/40 font-normal">({{ $slotsLeft }} slot{{ $slotsLeft > 1 ? 's' : '' }} remaining)</span>
                    </label>
                    <div id="logo-rows" class="flex flex-col gap-3">
                        <div class="logo-row flex gap-3 items-center">
                            <input type="file" name="logos[]" accept="image/*" required
                                class="flex-1 text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                            <input type="text" name="logo_names[]" placeholder="Label (e.g. SEAMEO)"
                                class="w-44 flex-shrink-0 border border-blue-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                        </div>
                    </div>
                    @if($slotsLeft > 1)
                        <button type="button" id="add-logo-row" class="mt-3 text-xs text-blue-700 hover:text-blue-900 flex items-center gap-1.5 transition">
                            <i data-feather="plus-circle" class="w-3.5 h-3.5"></i> Add another logo
                        </button>
                    @endif
                    @error('logos')   <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                    @error('logos.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    <p class="text-xs text-black/40 mt-3">Supported: JPG, PNG, WebP, SVG. Max 2MB. Transparent PNG recommended.</p>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                        <i data-feather="upload" class="w-4 h-4"></i> Upload Logo(s)
                    </button>
                </div>
            </form>
            <script>
                (function () {
                    const maxRows = {{ $slotsLeft }};
                    let rowCount = 1;
                    const btn = document.getElementById('add-logo-row');
                    if (!btn) return;
                    btn.addEventListener('click', function () {
                        if (rowCount >= maxRows) return;
                        rowCount++;
                        const row = document.createElement('div');
                        row.className = 'logo-row flex gap-3 items-center';
                        row.innerHTML = `
                            <input type="file" name="logos[]" accept="image/*"
                                class="flex-1 text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                            <input type="text" name="logo_names[]" placeholder="Label"
                                class="w-44 flex-shrink-0 border border-blue-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <button type="button" onclick="this.closest('.logo-row').remove(); rowCount--; if(rowCount < maxRows) document.getElementById('add-logo-row').classList.remove('hidden'); feather.replace();"
                                class="text-red-400 hover:text-red-600 flex-shrink-0 transition">
                                <i data-feather="x-circle" class="w-4 h-4"></i>
                            </button>`;
                        document.getElementById('logo-rows').appendChild(row);
                        feather.replace();
                        if (rowCount >= maxRows) btn.classList.add('hidden');
                    });
                })();
            </script>
        @else
            <div class="flex items-center gap-2 px-4 py-3 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-700">
                <i data-feather="alert-circle" class="w-4 h-4 flex-shrink-0"></i>
                All 3 logo slots are filled. Delete an existing logo to upload a new one.
            </div>
        @endif
    </div>

    {{-- ===== STATISTICS ===== --}}
    <form action="{{ route('admin.content.home.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
            <div class="flex items-start gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="bar-chart-2" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Statistics Section</h2>
                    <p class="text-sm text-black/50">Edit center and right stats below.</p>
                </div>
            </div>
            <div class="grid grid-cols-2 max-w-4xl mx-auto gap-10">
                <div class="border border-blue-200 rounded-xl p-4">
                    <p class="text-xs font-bold text-blue-900/60 uppercase tracking-widest mb-3 text-center">Stat 1 (Center)</p>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-blue-900 mb-1">Value</label>
                        <input type="text" name="home_stat2_value" value="{{ $contents['home_stat2_value'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="e.g. 50+">
                        @error('home_stat2_value') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900 mb-1">Label</label>
                        <input type="text" name="home_stat2_label" value="{{ $contents['home_stat2_label'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="e.g. Countries">
                        @error('home_stat2_label') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="border border-blue-200 rounded-xl p-4">
                    <p class="text-xs font-bold text-blue-900/60 uppercase tracking-widest mb-3 text-center">Stat 2 (Right)</p>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-blue-900 mb-1">Value</label>
                        <input type="text" name="home_stat3_value" value="{{ $contents['home_stat3_value'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="e.g. 20+">
                        @error('home_stat3_value') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900 mb-1">Label</label>
                        <input type="text" name="home_stat3_label" value="{{ $contents['home_stat3_label'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="e.g. Sessions">
                        @error('home_stat3_label') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i> Save Statistics
                </button>
            </div>
        </div>
    </form>

    {{-- ===== WHAT'S NEW IMAGES ===== --}}
    <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
        <div class="flex items-start gap-3 mb-5">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                <i data-feather="image" class="w-5 h-5"></i>
            </div>
            <div>
                <h2 class="text-[18px] font-semibold text-blue-900">"What's New?" Images</h2>
                <p class="text-sm text-black/50">Manage the image slider. Upload multiple images, delete unused ones.</p>
            </div>
        </div>

        @if($whatsNewImages->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                @foreach($whatsNewImages as $img)
                    <div class="relative group rounded-xl overflow-hidden border border-blue-100">
                        <img src="{{ asset('storage/' . $img->path) }}" class="w-full h-36 object-cover" alt="Image {{ $loop->iteration }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <form action="{{ route('admin.content.whats-new.delete', $img->id) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-1 transition">
                                    <i data-feather="trash-2" class="w-3.5 h-3.5"></i> Delete
                                </button>
                            </form>
                        </div>
                        <p class="text-xs text-center text-black/40 py-1 bg-white">Image {{ $loop->iteration }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-10 text-black/30 text-sm mb-6 border border-dashed border-blue-100 rounded-xl">
                No images yet. Upload images below.
            </div>
        @endif

        <form action="{{ route('admin.content.whats-new.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border border-blue-100 rounded-xl p-5 bg-blue-50/40">
                <label class="block text-sm font-medium text-blue-900 mb-2">
                    Upload New Images <span class="text-black/40 font-normal">(you can select multiple files)</span>
                </label>
                <input type="file" name="images[]" accept="image/*" multiple
                    class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                @error('images')   <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                @error('images.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                <p class="text-xs text-black/40 mt-2">Supported: JPG, PNG, WebP. Max 2MB per image.</p>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="upload" class="w-4 h-4"></i> Upload Images
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>