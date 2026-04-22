<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class AdminInformationController extends Controller
{
    /**
     * List all information items.
     */
    public function index()
    {
        $fixed       = Information::where('type', 'fixed')->orderBy('order')->get();
        $announcements = Information::where('type', 'optional')->orderBy('order')->get();

        return view('admin.information.index', compact('fixed', 'announcements'));
    }

    /**
     * Show edit form for a single item.
     */
    public function edit(Information $information)
    {
        return view('admin.information.edit', compact('information'));
    }

    /**
     * Update a single information record.
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title'        => 'nullable|string|max:500',
            'body'         => 'nullable|string',
            'release_date' => 'nullable|string|max:100',
            'is_active'    => 'boolean',
        ]);

        $information->update([
            'title'        => $request->input('title'),
            'body'         => $request->input('body'),
            'release_date' => $request->input('release_date'),
            'is_active'    => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.information.index')
            ->with('success', $information->label . ' updated successfully!');
    }

    /**
     * Show create form (announcements only).
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a new announcement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'nullable|string|max:500',
            'body'         => 'nullable|string',
            'release_date' => 'nullable|string|max:100',
            'is_active'    => 'boolean',
        ]);

        $count = Information::where('type', 'optional')->count();

        Information::create([
            'slug'         => 'announcement_' . ($count + 1) . '_' . time(),
            'label'        => 'Announcement ' . ($count + 1),
            'type'         => 'optional',
            'title'        => $request->input('title'),
            'body'         => $request->input('body'),
            'release_date' => $request->input('release_date'),
            'is_active'    => $request->boolean('is_active', true),
            'order'        => 10 + $count,
        ]);

        return redirect()->route('admin.information.index')
            ->with('success', 'Announcement added successfully!');
    }

    /**
     * Delete an announcement (optional type only).
     */
    public function destroy(Information $information)
    {
        if ($information->type === 'fixed') {
            return redirect()->route('admin.information.index')
                ->with('error', 'Fixed items cannot be deleted.');
        }

        $information->delete();

        return redirect()->route('admin.information.index')
            ->with('success', 'Announcement deleted successfully!');
    }
}