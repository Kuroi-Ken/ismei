{{--
    Shared form fields for pamflet create/edit.
    Variables expected: $pamflet (Model instance, or null for create mode)
--}}

<div class="grid grid-cols-1 gap-6">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Title
            <span class="text-black/30 font-normal">(optional — shown below the image on the public page)</span>
        </label>
        <input type="text" name="title"
            value="{{ old('title', optional($pamflet)->title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. ISMEI 2026 Official Poster">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Image Upload --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-2">
            Pamflet Image
            @if(!isset($pamflet) || !$pamflet)
                <span class="text-red-500">*</span>
            @endif
            <span class="text-black/30 font-normal">(portrait format recommended, e.g. A4 ratio)</span>
        </label>

        {{-- Current image preview (edit mode) --}}
        @if(isset($pamflet) && $pamflet && $pamflet->image)
            <div class="mb-4 flex gap-4 items-start">
                <div class="rounded-xl overflow-hidden border border-blue-100 flex-shrink-0">
                    <img src="{{ asset('storage/' . $pamflet->image) }}"
                        class="w-32 h-44 object-cover"
                        alt="Current pamflet image">
                </div>
                <div class="flex flex-col gap-2 pt-1">
                    <p class="text-xs font-medium text-blue-900">Current image</p>
                    <p class="text-xs text-black/40">Upload a new image below to replace it.</p>
                </div>
            </div>
        @endif

        {{-- Upload area --}}
        <div class="border-2 border-dashed border-blue-200 rounded-xl p-6 bg-blue-50/40 hover:border-blue-400 transition-colors cursor-pointer"
            onclick="document.getElementById('pamflet-file-input').click()">

            <input type="file"
                name="image"
                id="pamflet-file-input"
                accept="image/jpg,image/jpeg,image/png,image/webp"
                class="hidden"
                onchange="handlePamfletPreview(this)"
                {{ (!isset($pamflet) || !$pamflet) ? 'required' : '' }}>

            <div id="pamflet-placeholder" class="flex flex-col items-center gap-2 text-center pointer-events-none">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400">
                    <i data-feather="upload-cloud" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-900">Click to upload pamflet image</p>
                    <p class="text-xs text-black/40 mt-0.5">JPG, PNG, WebP — max 4MB</p>
                    <p class="text-xs text-black/30 mt-0.5">Recommended: portrait/A4 format (e.g. 794×1123px)</p>
                </div>
            </div>

            <div id="pamflet-preview-wrap" class="hidden flex flex-col items-center gap-3">
                <img id="pamflet-preview-img"
                    class="max-h-72 rounded-xl border border-blue-200 object-contain shadow-sm"
                    src="" alt="Preview">
                <p class="text-xs text-blue-700 font-medium">✓ Image selected — will be saved on submit</p>
            </div>
        </div>
        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Order --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-blue-900 mb-1">Display Order</label>
            <input type="number" name="order" min="0"
                value="{{ old('order', optional($pamflet)->order ?? 0) }}"
                class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                placeholder="0">
            <p class="text-xs text-black/40 mt-1">Lower number = shown first. Max 3 displayed publicly.</p>
            @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Visibility --}}
        <div>
            <label class="block text-sm font-medium text-blue-900 mb-3">Visibility</label>
            <label class="inline-flex items-center gap-3 cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', optional($pamflet)->is_active ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-slate-700">Show on Informations page</span>
            </label>
            <p class="text-xs text-black/40 mt-1 ml-7">When unchecked, this pamflet is hidden from the public page.</p>
        </div>
    </div>

</div>

<script>
    function handlePamfletPreview(input) {
        const placeholder  = document.getElementById('pamflet-placeholder');
        const previewWrap  = document.getElementById('pamflet-preview-wrap');
        const previewImg   = document.getElementById('pamflet-preview-img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                placeholder.classList.add('hidden');
                previewWrap.classList.remove('hidden');
                if (typeof feather !== 'undefined') feather.replace();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>