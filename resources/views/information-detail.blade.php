{{--
    Shared form fields for information create/edit.
    Variables expected: $information (Model instance, or null for create mode)
    Note: release_date removed — post time is auto-set via created_at->diffForHumans()
--}}

<div class="grid grid-cols-1 gap-6">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Title
            @if(isset($information) && $information && $information->type === 'fixed')
                <span class="text-black/30 font-normal">(card heading shown on the page)</span>
            @endif
        </label>
        <input type="text" name="title"
            value="{{ old('title', optional($information)->title ?? '') }}"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="e.g. Call for Submissions">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Featured Image --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-2">
            Featured Image
            <span class="text-black/30 font-normal">(banner shown at the top of the detail page)</span>
        </label>

        {{-- Current image preview (edit mode only) --}}
        @if(isset($information) && $information && $information->image)
            <div class="mb-3 rounded-xl overflow-hidden border border-blue-100 relative">
                <img src="{{ asset('storage/' . $information->image) }}"
                    class="w-full h-44 object-cover"
                    alt="Current featured image">
                <div class="absolute bottom-0 left-0 right-0 bg-black/50 px-4 py-2 flex items-center justify-between">
                    <span class="text-white text-xs">Current image</span>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="delete_image" value="1"
                            class="w-4 h-4 rounded border-red-300 text-red-500 focus:ring-red-400">
                        <span class="text-red-300 text-xs font-medium">Remove image</span>
                    </label>
                </div>
            </div>
        @endif

        {{-- Upload area --}}
        <div class="border-2 border-dashed border-blue-200 rounded-xl p-5 bg-blue-50/40 hover:border-blue-400 transition-colors cursor-pointer"
            id="image-drop-area"
            onclick="document.getElementById('image-file-input').click()">
            <input type="file"
                name="image"
                id="image-file-input"
                accept="image/jpg,image/jpeg,image/png,image/webp"
                class="hidden"
                onchange="handleImagePreview(this)">

            <div id="image-upload-placeholder" class="flex flex-col items-center gap-2 text-center pointer-events-none">
                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400">
                    <i data-feather="upload-cloud" class="w-5 h-5"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-900">Click to upload a featured image</p>
                    <p class="text-xs text-black/40 mt-0.5">JPG, PNG, WebP — max 4MB &nbsp;·&nbsp; Recommended: 1200×600px</p>
                </div>
            </div>

            <div id="image-preview-wrap" class="hidden">
                <img id="image-preview-img" class="w-full max-h-52 object-cover rounded-lg border border-blue-200" src="" alt="Preview">
                <p class="text-xs text-blue-700 mt-2 text-center font-medium">
                    ✓ New image selected — will be saved on submit
                </p>
            </div>
        </div>
        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Body — TinyMCE --}}
    <div>
        <label class="block text-sm font-medium text-blue-900 mb-1">
            Body Content
            <span class="text-black/30 font-normal">(rich text — paragraphs, tables, headings)</span>
        </label>
        <textarea name="body" id="tinymce-body" rows="12"
            class="w-full border border-blue-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Write content here...">{{ old('body', optional($information)->body ?? '') }}</textarea>
        @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
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
            <p class="text-xs text-black/40 mt-1 ml-7">Fixed cards still appear even when hidden — they show a placeholder instead.</p>
        @else
            <p class="text-xs text-black/40 mt-1 ml-7">When unchecked, this announcement is completely hidden on the page.</p>
        @endif
    </div>

</div>

<script>
    function handleImagePreview(input) {
        const placeholder = document.getElementById('image-upload-placeholder');
        const previewWrap = document.getElementById('image-preview-wrap');
        const previewImg  = document.getElementById('image-preview-img');

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

    document.addEventListener('DOMContentLoaded', function () {
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