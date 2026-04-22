{{--
    Shared form fields for information create/edit.
    Variables expected: $information (optional, for edit mode)
--}}

<div class="grid grid-cols-1 gap-5">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Title
            @if(isset($information) && $information->type === 'fixed')
                <span class="text-black/30 font-normal">(card heading on the page)</span>
            @endif
        </label>
        <input type="text" name="title"
            value="{{ old('title', $information->title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Call for Submissions">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Release Date --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Release Date
            <span class="text-black/30 font-normal">(shown under the card)</span>
        </label>
        <input type="text" name="release_date"
            value="{{ old('release_date', $information->release_date ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. April 22, 2026">
        @error('release_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Featured Image --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Featured Image
            <span class="text-black/30 font-normal">(shown at the top of the detail page)</span>
        </label>

        @if(isset($information) && $information->image)
            <div class="mb-3 flex items-start gap-4 p-3 bg-blue-50 border border-blue-100 rounded-xl">
                <img src="{{ asset('storage/' . $information->image) }}"
                    class="w-32 h-20 object-cover rounded-lg border border-blue-200 flex-shrink-0"
                    alt="Current image">
                <div class="flex-1">
                    <p class="text-xs text-black/50 mb-2">Current featured image. Upload a new one to replace it, or delete it below.</p>
                    <label class="inline-flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="delete_image" value="1"
                            class="w-4 h-4 rounded border-slate-300 text-red-500 focus:ring-red-400">
                        <span class="text-xs text-red-600 font-medium group-hover:text-red-700">Remove current image</span>
                    </label>
                </div>
            </div>
        @endif

        <input type="file" name="image" accept="image/*"
            class="w-full text-sm text-black/60 border border-blue-200 rounded-xl px-3 py-2 cursor-pointer bg-white
                   file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                   file:text-sm file:bg-blue-900 file:text-white hover:file:bg-blue-800">
        <p class="text-xs text-black/40 mt-1">JPG, PNG, WebP. Max 4MB. Recommended: wide format (e.g. 1200×600px).</p>
        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Body — TinyMCE --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Body Content
            <span class="text-black/30 font-normal">(rich text — paragraphs, images, headings)</span>
        </label>
        <textarea name="body" id="tinymce-body" rows="10"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Write content here...">{{ old('body', $information->body ?? '') }}</textarea>
        @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Visibility --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-3">Visibility</label>
        <label class="inline-flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $information->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-slate-700">Show this item on the informations page</span>
        </label>
        @if(isset($information) && $information->type === 'fixed')
            <p class="text-xs text-black/40 mt-1 ml-7">Fixed cards still appear on the page even when hidden; they just show a placeholder.</p>
        @else
            <p class="text-xs text-black/40 mt-1 ml-7">When unchecked, this announcement is completely hidden on the page.</p>
        @endif
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        tinymce.init({
            selector: '#tinymce-body',
            license_key: 'gpl',
            plugins: 'code table lists link image preview fullscreen wordcount searchreplace',
            toolbar: 'undo redo | blocks | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist | link image | table | fullscreen preview | code',
            height: 420,
            branding: false,
            promotion: false,
            automatic_uploads: false,
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    });
</script>