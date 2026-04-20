<x-admin-layout title="Edit Home Content">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Home Page Content</h1>
        <p class="text-sm text-black/40 mt-1">Manage and update content displayed on the homepage.</p>
    </div>

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
                    <h2 class="text-[18px] font-semibold text-blue-900">
                        Theme Text
                    </h2>
                    <p class="text-sm text-black/50">
                        Main quote and subtitle shown on the homepage hero section.
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1">Main Quote</label>
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
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.content.home.update-logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-2xl shadow p-7 mb-5 w-full">
            <div class="flex items-start gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="image" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Partner Logo</h2>
                    <p class="text-sm text-black/50">Update the SEAMEO logo or other partner logos on the homepage.</p>
                </div>
            </div>

            <div class="flex items-center gap-6">
                {{-- Preview Logo Saat Ini --}}
                <div class="w-24 h-24 rounded-xl border border-blue-100 flex items-center justify-center p-2 bg-gray-50">
                    <img src="{{ asset(\App\Models\SiteContent::get('home_logo_seameo', 'images/default-logo.png')) }}" 
                        alt="Current Logo" class="max-w-full max-h-full object-contain">
                </div>

                <div class="flex-1">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Upload New Logo</label>
                    <input type="file" name="home_logo_seameo" 
                        class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white
                                file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                                file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
                    <p class="text-xs text-black/40 mt-2">Recommended: Transparent PNG, Max 2MB.</p>
                </div>
            </div>

            <div class="flex justify-end mt-5">
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="upload" class="w-4 h-4"></i>
                    Update Logo
                </button>
            </div>
        </div>
    </form>

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
                    <h2 class="text-[18px] font-semibold text-blue-900">
                        Statistics Section
                    </h2>
                    <p class="text-sm text-black/50">
                        The first stat (Participants) is fixed at 300. You can edit the label and value for the center and right stats.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                {{-- Stat 1 - Fixed --}}
                <div class="border border-blue-100 rounded-xl p-4 bg-blue-50/40">
                    <p class="text-xs font-bold text-black/40 uppercase tracking-widest mb-3">Stat 1 (Fixed)</p>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-blue-900 mb-1">Value</label>
                        <input type="text" value="300" disabled
                            class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm bg-gray-100 text-black/40 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900 mb-1">Label</label>
                        <input type="text" value="Participants" disabled
                            class="w-full border border-blue-100 rounded-xl px-4 py-2 text-sm bg-gray-100 text-black/40 cursor-not-allowed">
                    </div>
                </div>

                {{-- Stat 2 - Editable --}}
                <div class="border border-blue-200 rounded-xl p-4">
                    <p class="text-xs font-bold text-blue-900/60 uppercase tracking-widest mb-3">Stat 2 (Center)</p>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-blue-900 mb-1">Value</label>
                        <input
                            type="text"
                            name="home_stat2_value"
                            value="{{ $contents['home_stat2_value'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="e.g. 50+">
                        @error('home_stat2_value')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900 mb-1">Label</label>
                        <input
                            type="text"
                            name="home_stat2_label"
                            value="{{ $contents['home_stat2_label'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="e.g. Countries">
                        @error('home_stat2_label')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Stat 3 - Editable --}}
                <div class="border border-blue-200 rounded-xl p-4">
                    <p class="text-xs font-bold text-blue-900/60 uppercase tracking-widest mb-3">Stat 3 (Right)</p>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-blue-900 mb-1">Value</label>
                        <input
                            type="text"
                            name="home_stat3_value"
                            value="{{ $contents['home_stat3_value'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="e.g. 20+">
                        @error('home_stat3_value')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-blue-900 mb-1">Label</label>
                        <input
                            type="text"
                            name="home_stat3_label"
                            value="{{ $contents['home_stat3_label'] ?? '' }}"
                            class="w-full border border-blue-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                            placeholder="e.g. Sessions">
                        @error('home_stat3_label')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i>
                    Save Statistics
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
                <h2 class="text-[18px] font-semibold text-blue-900">
                    "What's New?" Images
                </h2>
                <p class="text-sm text-black/50">
                    Manage the image slider. Upload multiple images, delete unused ones.
                </p>
            </div>
        </div>

        @if($whatsNewImages->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                @foreach($whatsNewImages as $img)
                    <div class="relative group rounded-xl overflow-hidden border border-blue-100">
                        <img
                            src="{{ asset('storage/' . $img->path) }}"
                            class="w-full h-36 object-cover"
                            alt="Image {{ $loop->iteration }}">

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <form action="{{ route('admin.content.whats-new.delete', $img->id) }}" method="POST"
                                onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-1 transition">
                                    <i data-feather="trash-2" class="w-3.5 h-3.5"></i> Delete
                                </button>
                            </form>
                        </div>

                        <p class="text-xs text-center text-black/40 py-1 bg-white">
                            Image {{ $loop->iteration }}
                        </p>
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
                    Upload New Images
                    <span class="text-black/40 font-normal">(you can select multiple files)</span>
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
                <p class="text-xs text-black/40 mt-2">Supported formats: JPG, PNG, WebP. Max 2MB per image.</p>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="upload" class="w-4 h-4"></i>
                    Upload Images
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>