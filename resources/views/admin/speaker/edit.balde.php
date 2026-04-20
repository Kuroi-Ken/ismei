<x-admin-layout title="Edit Speaker">

    @if(session('success'))
    <div
        class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
        <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.speakers.index') }}"
            class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-900 hover:bg-blue-100 transition">
            <i data-feather="arrow-left" class="w-4 h-4"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Edit Speaker</h1>
            <p class="text-sm text-black/40 mt-0.5">Editing: <span
                    class="font-medium text-blue-900">{{ $speaker->name }}</span></p>
        </div>
    </div>

    <form action="{{ route('admin.speakers.update', $speaker->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow p-7 mb-5">
            <div class="flex items-start gap-3 mb-6">
                <div
                    class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                    <i data-feather="edit" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-[18px] font-semibold text-blue-900">Speaker Information</h2>
                    <p class="text-sm text-black/50">Update the speaker's details below.</p>
                </div>
            </div>

            @include('admin.speakers._form', ['speaker' => $speaker])
        </div>

        <div class="flex justify-between">
            <form action="{{ route('admin.speakers.destroy', $speaker->id) }}" method="POST"
                onsubmit="return confirm('Permanently delete {{ $speaker->name }}?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-5 py-2.5 rounded-xl bg-red-50 text-red-600 text-sm font-medium hover:bg-red-600 hover:text-white transition flex items-center gap-2">
                    <i data-feather="trash-2" class="w-4 h-4"></i>
                    Delete Speaker
                </button>
            </form>

            <div class="flex gap-3">
                <a href="{{ route('admin.speakers.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-blue-200 text-blue-900 text-sm font-medium hover:bg-blue-50 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-8 py-2.5 rounded-xl transition flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </form>

</x-admin-layout>