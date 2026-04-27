{{--
    Shared form fields for speaker create/edit.
    Variables expected: $speaker (Model instance, or null for create mode)
--}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Name --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Name <span class="text-red-500">*</span>
        </label>
        <input type="text" name="name"
            value="{{ old('name', optional($speaker)->name ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. John Doe" required>
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Institution --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Institution</label>
        <input type="text" name="institution"
            value="{{ old('institution', optional($speaker)->institution ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. University of Michigan">
        @error('institution') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Country --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Country</label>
        <input type="text" name="country"
            value="{{ old('country', optional($speaker)->country ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. United States">
        @error('country') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Order & Is Active --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Display Order</label>
        <input type="number" name="order" min="0"
            value="{{ old('order', optional($speaker)->order ?? 0) }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="0">
        <p class="text-xs text-black/40 mt-1">Lower number = shown first.</p>
        @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Visibility --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-3">Visibility</label>
        <label class="inline-flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', optional($speaker)->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-slate-700">Show this speaker on the Symposium page</span>
        </label>
        <p class="text-xs text-black/40 mt-1 ml-7">When unchecked, this speaker is completely hidden.</p>
    </div>

</div>

{{-- Photo — full width --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-blue-900 mb-2">
        Photo
        <span class="text-black/30 font-normal">(portrait recommended, square or 3:4 ratio)</span>
    </label>

    {{-- Current photo preview (edit mode) --}}
    @if(isset($speaker) && $speaker && $speaker->photo)
        <div class="mb-3 flex gap-4 items-start">
            <div class="rounded-xl overflow-hidden border border-blue-100 flex-shrink-0">
                <img src="{{ asset('storage/' . $speaker->photo) }}"
                    class="w-24 h-32 object-cover"
                    alt="Current photo">
            </div>
            <div class="flex flex-col gap-1 pt-1">
                <p class="text-xs font-medium text-blue-900">Current photo</p>
                <p class="text-xs text-black/40">Upload a new photo below to replace it.</p>
            </div>
        </div>
    @endif

    {{-- Upload area --}}
    <div class="border-2 border-dashed border-blue-200 rounded-xl p-5 bg-blue-50/40 hover:border-blue-400 transition-colors cursor-pointer"
        onclick="document.getElementById('speaker-photo-input').click()">
        <input type="file"
            name="photo"
            id="speaker-photo-input"
            accept="image/jpg,image/jpeg,image/png,image/webp"
            class="hidden"
            onchange="handleSpeakerPhotoPreview(this)">

        <div id="speaker-photo-placeholder" class="flex flex-col items-center gap-2 text-center pointer-events-none">
            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400">
                <i data-feather="upload-cloud" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-blue-900">Click to upload a photo</p>
                <p class="text-xs text-black/40 mt-0.5">JPG, PNG, WebP — max 3MB</p>
            </div>
        </div>

        <div id="speaker-photo-preview-wrap" class="hidden flex flex-col items-center gap-2">
            <img id="speaker-photo-preview-img"
                class="max-h-52 rounded-xl border border-blue-200 object-contain shadow-sm"
                src="" alt="Preview">
            <p class="text-xs text-blue-700 font-medium">✓ Photo selected — will be saved on submit</p>
        </div>
    </div>
    @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Bio — full width TinyMCE --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-blue-900 mb-1">
        Biography
        <span class="text-black/30 font-normal">(rich text — paragraphs, lists, links)</span>
    </label>
    <textarea name="bio" id="tinymce-bio" rows="8"
        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
        placeholder="Write speaker biography here...">{{ old('bio', optional($speaker)->bio ?? '') }}</textarea>
    @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Presentation Title --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-blue-900 mb-1">
        Presentation Title
        <span class="text-black/30 font-normal">(keynote talk title)</span>
    </label>
    <input type="text" name="presentation_title"
        value="{{ old('presentation_title', optional($speaker)->presentation_title ?? '') }}"
        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
        placeholder="e.g. AI-Driven Approaches in Modern Mathematics Education">
    @error('presentation_title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Presentation Abstract — TinyMCE --}}
<div class="mt-6">
    <label class="block text-sm font-medium text-blue-900 mb-1">
        Presentation Abstract
        <span class="text-black/30 font-normal">(rich text)</span>
    </label>
    <textarea name="presentation_abstract" id="tinymce-abstract" rows="8"
        class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
        placeholder="Write presentation abstract here...">{{ old('presentation_abstract', optional($speaker)->presentation_abstract ?? '') }}</textarea>
    @error('presentation_abstract') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<script>
    function handleSpeakerPhotoPreview(input) {
        const placeholder  = document.getElementById('speaker-photo-placeholder');
        const previewWrap  = document.getElementById('speaker-photo-preview-wrap');
        const previewImg   = document.getElementById('speaker-photo-preview-img');

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