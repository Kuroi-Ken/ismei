<x-admin-layout title="Edit Post">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.information.index') }}"
            class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-900 hover:bg-blue-100 transition">
            <i data-feather="arrow-left" class="w-4 h-4"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Edit Post</h1>
            <p class="text-sm text-black/40 mt-0.5">
                Editing:
                <span class="font-medium text-blue-900">{{ $information->title ?? $information->label }}</span>
                @if($information->type === 'fixed')
                    <span class="ml-2 text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full">Fixed</span>
                @else
                    <span class="ml-2 text-xs px-2 py-0.5 bg-amber-100 text-amber-700 rounded-full">Post</span>
                @endif
                @if($information->release_date)
                    <span class="ml-2 text-xs text-black/30">· Published {{ $information->release_date }}</span>
                @endif
            </p>
        </div>
    </div>

    <form action="{{ route('admin.information.update', $information->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow p-7 mb-5">
            <div class="flex items-start gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="{{ $information->type === 'fixed' ? 'file-text' : 'edit' }}" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">{{ $information->label }}</h2>
                    <p class="text-sm text-black/50">
                        Update the content below. Supports rich text, a featured image, and an additional image below the body.
                    </p>
                </div>
            </div>

            @include('admin.information._form', ['information' => $information])
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.information.index') }}"
                class="px-6 py-2.5 rounded-xl border border-blue-200 text-blue-900 text-sm font-medium hover:bg-blue-50 transition">
                Cancel
            </a>
            <button type="submit"
                class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                <i data-feather="save" class="w-4 h-4"></i>
                Save Changes
            </button>
        </div>
    </form>

</x-admin-layout>