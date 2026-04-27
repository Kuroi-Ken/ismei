<x-admin-layout title="Add Post">

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.information.index') }}"
            class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-900 hover:bg-blue-100 transition">
            <i data-feather="arrow-left" class="w-4 h-4"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Add New Post</h1>
            <p class="text-sm text-black/40 mt-0.5">
                Fill in the details below. Release date will be set automatically.
            </p>
        </div>
    </div>

    <form action="{{ route('admin.information.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="bg-white rounded-2xl shadow p-7 mb-5">
            <div class="flex items-start gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 flex-shrink-0">
                    <i data-feather="file-plus" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Post Details</h2>
                    <p class="text-sm text-black/50">
                        Add a featured image, body content, and an optional additional image below the body.
                        Release date is set automatically when you save.
                    </p>
                </div>
            </div>

            @include('admin.information._form', ['information' => null])
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.information.index') }}"
                class="px-6 py-2.5 rounded-xl border border-blue-200 text-blue-900 text-sm font-medium hover:bg-blue-50 transition">
                Cancel
            </a>
            <button type="submit"
                class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                <i data-feather="save" class="w-4 h-4"></i>
                Save Post
            </button>
        </div>
    </form>

</x-admin-layout>