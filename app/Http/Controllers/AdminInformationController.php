<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminInformationController extends Controller
{
    public function index()
    {
        $fixed         = Information::where('type', 'fixed')->orderBy('order')->get();
        $announcements = Information::where('type', 'optional')->orderBy('order')->get();

        return view('admin.information.index', compact('fixed', 'announcements'));
    }

    public function edit(Information $information)
    {
        return view('admin.information.edit', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title'        => 'nullable|string|max:500',
            'body'         => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'delete_image' => 'nullable',
            'is_active'    => 'boolean',
        ]);

        $data = [
            'title'     => $request->input('title'),
            'body'      => $request->input('body'),
            'is_active' => $request->boolean('is_active', true),
        ];

        // Handle image delete
        if ($request->input('delete_image') && $information->image) {
            Storage::disk('public')->delete($information->image);
            $data['image'] = null;
        }

        // Handle new image upload (overrides delete if both sent)
        if ($request->hasFile('image')) {
            if ($information->image) {
                Storage::disk('public')->delete($information->image);
            }
            $data['image'] = $request->file('image')->store('informations', 'public');
        }

        $information->update($data);

        return redirect()->route('admin.information.index')
            ->with('success', $information->label . ' updated successfully!');
    }

    public function create()
    {
        return view('admin.information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'nullable|string|max:500',
            'body'      => 'nullable|string',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_active' => 'boolean',
        ]);

        $count = Information::where('type', 'optional')->count();

        $data = [
            'slug'      => 'announcement_' . ($count + 1) . '_' . time(),
            'label'     => 'Announcement ' . ($count + 1),
            'type'      => 'optional',
            'title'     => $request->input('title'),
            'body'      => $request->input('body'),
            'is_active' => $request->boolean('is_active', true),
            'order'     => 10 + $count,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('informations', 'public');
        }

        Information::create($data);

        return redirect()->route('admin.information.index')
            ->with('success', 'Announcement added successfully!');
    }

    public function destroy(Information $information)
    {
        if ($information->type === 'fixed') {
            return redirect()->route('admin.information.index')
                ->with('error', 'Fixed items cannot be deleted.');
        }

        if ($information->image) {
            Storage::disk('public')->delete($information->image);
        }

        $information->delete();

        return redirect()->route('admin.information.index')
            ->with('success', 'Announcement deleted successfully!');
    }
}