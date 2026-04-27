<x-admin-layout title="Pamflets">

    @if(session('success'))
        <div class="mb-5 px-5 py-3 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Poster & Pamflet</h1>
            <p class="text-sm text-black/40 mt-1">Manage poster and pamflet images shown on the Informations page.</p>
        </div>
        <a href="{{ route('admin.pamflet.create') }}"
            class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition flex items-center gap-2">
            <i data-feather="plus" class="w-4 h-4"></i>
            Add Pamflet
        </a>
    </div>

    @if($pamflets->isEmpty())
        <div class="bg-white rounded-2xl shadow p-12 text-center">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-feather="image" class="w-8 h-8 text-blue-300"></i>
            </div>
            <h3 class="text-lg font-semibold text-slate-700 mb-2">No pamflets yet</h3>
            <p class="text-sm text-black/40 mb-6">Add your first poster or pamflet image to display on the informations page.</p>
            <a href="{{ route('admin.pamflet.create') }}"
                class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition">
                <i data-feather="plus" class="w-4 h-4"></i>
                Add First Pamflet
            </a>
        </div>
    @else
        {{-- Info tip --}}
        <div class="mb-4 flex items-center gap-2 px-4 py-3 bg-blue-50 border border-blue-100 rounded-xl text-xs text-blue-700">
            <i data-feather="info" class="w-4 h-4 flex-shrink-0"></i>
            Up to 3 pamflets will be displayed on the public Informations page. Use the Order field to control which appear first.
        </div>

        {{-- Grid preview --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mb-8">
            @foreach($pamflets as $pamflet)
                <div class="bg-white rounded-2xl shadow border border-slate-100 overflow-hidden flex flex-col group">

                    {{-- Image --}}
                    <div class="relative overflow-hidden h-60 bg-slate-50">
                        <img src="{{ asset('storage/' . $pamflet->image) }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            alt="{{ $pamflet->title ?? 'Pamflet' }}">

                        {{-- Status badge --}}
                        <div class="absolute top-3 left-3">
                            @if($pamflet->is_active)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wide shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Visible
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg bg-slate-200 text-slate-500 text-[10px] font-bold uppercase tracking-wide shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Hidden
                                </span>
                            @endif
                        </div>

                        {{-- Order badge --}}
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-0.5 rounded-lg bg-blue-900/80 text-white text-[10px] font-bold shadow-sm">
                                #{{ $pamflet->order }}
                            </span>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="p-4 flex flex-col gap-3 flex-1">
                        <p class="text-sm font-semibold text-blue-900 truncate">
                            {{ $pamflet->title ?? '(No title)' }}
                        </p>

                        {{-- Actions --}}
                        <div class="flex gap-2 mt-auto">
                            <a href="{{ route('admin.pamflet.edit', $pamflet->id) }}"
                                class="flex-1 flex items-center justify-center gap-1.5 py-1.5 rounded-lg bg-blue-50 text-blue-900 text-xs font-medium hover:bg-blue-900 hover:text-white transition">
                                <i data-feather="edit-2" class="w-3.5 h-3.5"></i> Edit
                            </a>
                            <form action="{{ route('admin.pamflet.destroy', $pamflet->id) }}" method="POST"
                                onsubmit="return confirm('Delete this pamflet?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-xs font-medium hover:bg-red-600 hover:text-white transition">
                                    <i data-feather="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Table view --}}
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 bg-blue-50">
                <h2 class="text-sm font-bold text-blue-900 uppercase tracking-widest">All Pamflets</h2>
            </div>
            <table class="w-full">
                <thead class="border-b border-slate-100">
                    <tr>
                        <th class="text-left px-6 py-3 text-xs font-bold text-blue-900 uppercase tracking-widest w-12">Order</th>
                        <th class="text-left px-6 py-3 text-xs font-bold text-blue-900 uppercase tracking-widest">Title</th>
                        <th class="text-left px-6 py-3 text-xs font-bold text-blue-900 uppercase tracking-widest w-24">Status</th>
                        <th class="text-right px-6 py-3 text-xs font-bold text-blue-900 uppercase tracking-widest w-28">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($pamflets as $pamflet)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-3 text-sm text-black/40 font-medium">{{ $pamflet->order }}</td>
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-14 rounded-lg overflow-hidden flex-shrink-0 bg-blue-50 border border-blue-100">
                                        <img src="{{ asset('storage/' . $pamflet->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <p class="text-sm font-medium text-slate-800">{{ $pamflet->title ?? '(No title)' }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-3">
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
                            <td class="px-6 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pamflet.edit', $pamflet->id) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-900 hover:bg-blue-900 hover:text-white transition">
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