<x-admin-layout title="Keynote Speakers">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Keynote Speakers</h1>
            <p class="text-sm text-black/40 mt-1">Manage speakers shown on the Symposium page.</p>
        </div>
        <a href="{{ route('admin.speaker.create') }}"
            class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition flex items-center gap-2">
            <i data-feather="plus" class="w-4 h-4"></i>
            Add Speaker
        </a>
    </div>

    @if($speakers->isEmpty())
        <div class="bg-white rounded-2xl shadow p-12 text-center">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-feather="users" class="w-8 h-8 text-blue-300"></i>
            </div>
            <h3 class="text-lg font-semibold text-slate-700 mb-2">No speakers yet</h3>
            <p class="text-sm text-black/40 mb-6">Add your first keynote speaker to display on the symposium page.</p>
            <a href="{{ route('admin.speaker.create') }}"
                class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition">
                <i data-feather="plus" class="w-4 h-4"></i>
                Add First Speaker
            </a>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-blue-50 border-b border-blue-100">
                    <tr>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-16">Order</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest">Speaker</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest hidden md:table-cell">Country</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest hidden lg:table-cell">Presentation</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-24">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-28">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($speakers as $speaker)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-sm text-black/40 font-medium">{{ $speaker->order }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden flex-shrink-0 bg-blue-100">
                                        @if($speaker->photo)
                                            <img src="{{ asset('storage/' . $speaker->photo) }}"
                                                class="w-full h-full object-cover" alt="{{ $speaker->name }}">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i data-feather="user" class="w-5 h-5 text-blue-400"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">{{ $speaker->name }}</p>
                                        @if($speaker->title)
                                            <p class="text-xs text-black/40">{{ $speaker->title }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                @if($speaker->country)
                                    <p class="text-xs text-black/40">{{ $speaker->country }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 hidden lg:table-cell">
                                <p class="text-sm text-slate-600 max-w-xs truncate">
                                    {{ $speaker->presentation_title ?? '—' }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                @if($speaker->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-500 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Hidden
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.speaker.edit', $speaker->id) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-900 hover:bg-blue-900 hover:text-white transition">
                                        <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                                    </a>
                                    <form action="{{ route('admin.speaker.destroy', $speaker->id) }}" method="POST"
                                        onsubmit="return confirm('Delete {{ $speaker->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition">
                                            <i data-feather="trash-2" class="w-3.5 h-3.5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</x-admin-layout>