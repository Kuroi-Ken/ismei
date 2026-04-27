<?php

namespace App\Http\Controllers;

use App\Models\Pamflet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPamfletController extends Controller
{
    public function index()
    {
        $pamflets = Pamflet::orderBy('order')->orderBy('id')->get();
        return view('admin.pamflet.index', compact('pamflets'));
    }

    public function create()
    {
        return view('admin.pamflet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'nullable|string|max:255',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'order'     => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title'     => $request->input('title'),
            'order'     => $request->input('order', Pamflet::max('order') + 1 ?? 1),
            'is_active' => $request->boolean('is_active', true),
            'image'     => $request->file('image')->store('pamflets', 'public'),
        ];

        Pamflet::create($data);

        return redirect()->route('admin.pamflet.index')
            ->with('success', 'Pamflet added successfully!');
    }

    public function edit(Pamflet $pamflet)
    {
        return view('admin.pamflet.edit', compact('pamflet'));
    }

    public function update(Request $request, Pamflet $pamflet)
    {
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'order'        => 'nullable|integer|min:0',
            'is_active'    => 'boolean',
            'delete_image' => 'nullable',
        ]);

        $data = [
            'title'     => $request->input('title'),
            'order'     => $request->input('order', $pamflet->order),
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($pamflet->image);
            $data['image'] = $request->file('image')->store('pamflets', 'public');
        }

        $pamflet->update($data);

        return redirect()->route('admin.pamflet.index')
            ->with('success', 'Pamflet updated successfully!');
    }

    public function destroy(Pamflet $pamflet)
    {
        Storage::disk('public')->delete($pamflet->image);
        $pamflet->delete();

        return redirect()->route('admin.pamflet.index')
            ->with('success', 'Pamflet deleted successfully!');
    }

    /**
     * Update display order via simple POST (called when dragging or reordering).
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'integer|exists:pamflets,id',
        ]);

        foreach ($request->ids as $order => $id) {
            Pamflet::where('id', $id)->update(['order' => $order + 1]);
        }

        return response()->json(['success' => true]);
    }
}