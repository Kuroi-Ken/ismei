<x-admin-layout title="Informations">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-5 px-5 py-3 bg-red-100 border border-red-300 text-red-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="alert-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Informations Page</h1>
            <p class="text-sm text-black/40 mt-1">Manage content shown on the Informations page.</p>
        </div>
    </div>

    {{-- FIXED CARDS --}}
    <div class="flex items-center gap-2 mb-3">
        <span class="w-2 h-2 rounded-full bg-blue-900"></span>
        <h2 class="text-sm font-bold text-blue-900 uppercase tracking-widest">Fixed Cards</h2>
        <span class="text-xs text-black/40">(always shown on front-end, cannot be deleted)</span>
    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden mb-8">
        <table class="w-full">
            <thead class="bg-blue-50 border-b border-blue-100">
                <tr>
                    <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest">Item</th>
                    <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest hidden md:table-cell">Title</th>
                    <th class="text-center px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-24">Edit</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($fixed as $info)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center text-blue-900 flex-shrink-0">
                                    <i data-feather="{{ $info->slug === 'call_for_submission' ? 'file-text' : 'calendar' }}" class="w-4 h-4"></i>
                                </div>
                                <p class="text-sm font-semibold text-slate-800">{{ $info->label }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <p class="text-sm text-slate-600 max-w-xs truncate">{{ $info->title ?? '—' }}</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.information.edit', $info->id) }}"
                                class="w-8 h-8 inline-flex items-center justify-center rounded-lg bg-blue-50 text-blue-900 hover:bg-blue-900 hover:text-white transition">
                                <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-sm text-black/30">
                            No fixed items found. Run: <code>php artisan db:seed --class=InformationSeeder</code>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ADDITIONAL INFORMATION POSTS --}}
    <div class="flex items-center gap-2 mb-3 justify-between">
        <div class="">
            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
            <h2 class="text-sm font-bold text-blue-900 uppercase tracking-widest">Additional Information</h2>
            <span class="text-xs text-black/40">(optional posts — can be added & deleted)</span>
        </div>
        <div class="">
            <a href="{{ route('admin.information.create') }}"
                class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition flex items-center gap-2">
                <i data-feather="plus" class="w-4 h-4"></i>
                Add Post
            </a>
        </div>
    </div>

    @if($announcements->isEmpty())
        <div class="bg-white rounded-2xl shadow p-12 text-center mb-10">
            <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-feather="file-plus" class="w-8 h-8 text-amber-300"></i>
            </div>
            <h3 class="text-lg font-semibold text-slate-700 mb-2">No posts yet</h3>
            <p class="text-sm text-black/40 mb-6">Add your first post to display on the informations page.</p>
            <a href="{{ route('admin.information.create') }}"
                class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition">
                <i data-feather="plus" class="w-4 h-4"></i>
                Add First Post
            </a>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow overflow-hidden mb-10">
            <table class="w-full">
                <thead class="bg-amber-50 border-b border-amber-100">
                    <tr>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest">Title</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest hidden md:table-cell">Release Date</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-24">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-28">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($announcements as $ann)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($ann->image)
                                        <div class="w-10 h-10 rounded-lg overflow-hidden flex-shrink-0 bg-blue-50">
                                            <img src="{{ asset('storage/' . $ann->image) }}"
                                                class="w-full h-full object-cover" alt="">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                                            <i data-feather="file-text" class="w-4 h-4 text-amber-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $ann->title ?? '(No title)' }}
                                        </p>
                                        @if(!$ann->hasContent())
                                            <p class="text-xs text-amber-500">No content yet</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <p class="text-sm text-slate-500">{{ $ann->release_date ?? '—' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($ann->is_active)
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
                                    <a href="{{ route('admin.information.edit', $ann->id) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-900 hover:bg-blue-900 hover:text-white transition">
                                        <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                                    </a>
                                    <form action="{{ route('admin.information.destroy', $ann->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this post?')">
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

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- POSTER & PAMFLET SECTION                                        --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}

    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
            <h2 class="text-sm font-bold text-blue-900 uppercase tracking-widest">Poster & Pamflet</h2>
            <span class="text-xs text-black/40">(max 3 displayed publicly)</span>
        </div>
        <a href="{{ route('admin.pamflet.create') }}"
            class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-xl transition flex items-center gap-2">
            <i data-feather="plus" class="w-4 h-4"></i>
            Add Pamflet
        </a>
    </div>

    @if($pamflets->isEmpty())
        <div class="bg-white rounded-2xl shadow p-10 text-center border-2 border-dashed border-indigo-100">
            <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <i data-feather="image" class="w-7 h-7 text-indigo-300"></i>
            </div>
            <h3 class="text-base font-semibold text-slate-700 mb-1">No pamflets yet</h3>
            <p class="text-sm text-black/40 mb-5">Upload poster or pamflet images to display on the informations page.</p>
            <a href="{{ route('admin.pamflet.create') }}"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2 rounded-xl transition">
                <i data-feather="plus" class="w-4 h-4"></i>
                Add First Pamflet
            </a>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-indigo-50 border-b border-indigo-100">
                    <tr>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest">Pamflet</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-20">Order</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-24">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-bold text-blue-900 uppercase tracking-widest w-28">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($pamflets as $pamflet)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-14 rounded-lg overflow-hidden flex-shrink-0 bg-indigo-50 border border-indigo-100">
                                        <img src="{{ asset('storage/' . $pamflet->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <p class="text-sm font-medium text-slate-800">
                                        {{ $pamflet->title ?? '(No title)' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-black/40 font-medium">#{{ $pamflet->order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($pamflet->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Visible
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-500 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Hidden
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pamflet.edit', $pamflet->id) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-700 hover:text-white transition">
                                        <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                                    </a>
                                    <form action="{{ route('admin.pamflet.destroy', $pamflet->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this pamflet?')">
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