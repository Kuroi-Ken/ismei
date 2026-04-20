{{-- 
    Shared form fields for speaker create/edit.
    Variables expected: $speaker (optional, for edit mode)
--}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    {{-- Name --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Full Name <span class="text-red-500">*</span></label>
        <input type="text" name="name"
            value="{{ old('name', $speaker->name ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Thiradet Jiarasuksakun" required>
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Title / Honorific --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Academic Title</label>
        <input type="text" name="title"
            value="{{ old('title', $speaker->title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Assoc. Prof. Dr.">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Country --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Country</label>
        <input type="text" name="country"
            value="{{ old('country', $speaker->country ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Thailand">
        @error('country') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Institution --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Institution / Organization</label>
        <input type="text" name="institution"
            value="{{ old('institution', $speaker->institution ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. King Mongkut's University of Technology Thonburi">
        @error('institution') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Photo --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Profile Photo</label>

        @if(!empty($speaker->photo))
            <div class="mb-3 flex items-center gap-4">
                <img src="{{ asset('storage/' . $speaker->photo) }}"
                    class="w-20 h-20 object-cover rounded-xl border border-blue-100" alt="Current photo">
                <p class="text-xs text-black/40">Current photo. Upload a new one to replace it.</p>
            </div>
        @endif

        <input type="file" name="photo" accept="image/*"
            class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white
                   file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                   file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
        <p class="text-xs text-black/40 mt-1">JPG, PNG, WebP. Max 3MB. Recommended: square crop.</p>
        @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Bio --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Biography</label>
        <textarea name="bio" rows="6"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none"
            placeholder="Write the speaker's biography here...">{{ old('bio', $speaker->bio ?? '') }}</textarea>
        @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Presentation Title --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Presentation Title</label>
        <input type="text" name="presentation_title"
            value="{{ old('presentation_title', $speaker->presentation_title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Digital Tools in Mathematics Education">
        @error('presentation_title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Presentation Abstract --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-blue-900 mb-1">Presentation Abstract / Summary</label>
        <textarea name="presentation_abstract" rows="6"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none"
            placeholder="Write the presentation abstract here...">{{ old('presentation_abstract', $speaker->presentation_abstract ?? '') }}</textarea>
        @error('presentation_abstract') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Order & Status --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">Display Order</label>
        <input type="number" name="order" min="0"
            value="{{ old('order', $speaker->order ?? 0) }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
        <p class="text-xs text-black/40 mt-1">Lower number = shown first.</p>
        @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-blue-900 mb-3">Visibility</label>
        <label class="inline-flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $speaker->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-slate-700">Show this speaker on the symposium page</span>
        </label>
    </div>

</div>