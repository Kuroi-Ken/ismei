{{--
    Shared form fields for information create/edit.
    Variables expected: $information (optional, for edit mode)
--}}

<div class="grid grid-cols-1 gap-5">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Title
            @if(isset($information) && $information && $information->type === 'fixed')
                <span class="text-black/30 font-normal">(card heading on the page)</span>
            @endif
        </label>
        <input type="text" name="title"
            value="{{ old('title', optional($information)->title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Call for Submissions">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    
    {{-- Body — TinyMCE --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Body Content
            <span class="text-black/30 font-normal">(rich text — paragraphs, images, headings)</span>
        </label>
        <textarea name="body" id="tinymce-body" rows="10"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Write content here...">{{ old('body', optional($information)->body ?? '') }}</textarea>
        @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Additional Image (image2) - Below TinyMCE --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-2">
            Additional Image
            <span class="text-black/30 font-normal">(optional — shown below body content on detail page)</span>
        </label>

        @if(isset($information) && $information && $information->image2)
            <div class="mb-3 rounded-xl overflow-hidden border border-blue-100 relative">
                <img src="{{ asset('storage/' . $information->image2) }}"
                    class="w-full h-44 object-cover" alt="Current additional image">
                <div class="absolute bottom-0 left-0 right-0 bg-black/50 px-4 py-2 flex items-center justify-between">
                    <span class="text-white text-xs">Current additional image</span>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="delete_image2" value="1"
                            class="w-4 h-4 rounded border-red-300 text-red-500 focus:ring-red-400">
                        <span class="text-red-300 text-xs font-medium">Remove image</span>
                    </label>
                </div>
            </div>
        @endif

        <div class="border-2 border-dashed border-blue-200 rounded-xl p-5 bg-blue-50/40 hover:border-blue-400 transition-colors cursor-pointer"
            onclick="document.getElementById('image2-file-input').click()">
            <input type="file" name="image2" id="image2-file-input"
                accept="image/jpg,image/jpeg,image/png,image/webp" class="hidden"
                onchange="handleImagePreview(this, 'preview-img-2', 'placeholder-2', 'preview-wrap-2')">

            <div id="placeholder-2" class="flex flex-col items-center gap-2 text-center pointer-events-none">
                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400">
                    <i data-feather="image" class="w-5 h-5"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-900">Click to upload additional image</p>
                    <p class="text-xs text-black/40 mt-0.5">JPG, PNG, WebP — max 4MB</p>
                </div>
            </div>
            <div id="preview-wrap-2" class="hidden">
                <img id="preview-img-2" class="w-full max-h-52 object-cover rounded-lg border border-blue-200" src="" alt="Preview">
                <p class="text-xs text-blue-700 mt-2 text-center font-medium">✓ Image selected — will be saved on submit</p>
            </div>
        </div>
        @error('image2') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Visibility --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-3">Visibility</label>
        <label class="inline-flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', optional($information)->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-slate-700">Show this item on the informations page</span>
        </label>
        @if(isset($information) && $information && $information->type === 'fixed')
            <p class="text-xs text-black/40 mt-1 ml-7">Fixed cards still appear on the page even when hidden; they just show a placeholder.</p>
        @else
            <p class="text-xs text-black/40 mt-1 ml-7">When unchecked, this post is completely hidden on the page.</p>
        @endif
    </div>

</div>

<script>
    function handleImagePreview(input, previewImgId, placeholderId, previewWrapId) {
        const placeholder = document.getElementById(placeholderId);
        const previewWrap = document.getElementById(previewWrapId);
        const previewImg  = document.getElementById(previewImgId);

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

    document.addEventListener("DOMContentLoaded", function () {
        if (typeof tinymce !== 'undefined') {
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
        }
    });
</script>