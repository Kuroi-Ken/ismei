<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSpeakerController extends Controller
{
    /**
     * List all speakers.
     */
    public function index()
    {
        $speakers = Speaker::orderBy('order')->orderBy('id')->get();
        return view('admin.speaker.index', compact('speakers'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.speaker.create');
    }

    /**
     * Store a new speaker.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                    => 'required|string|max:255',
            'title'                   => 'nullable|string|max:255',
            'institution'             => 'nullable|string|max:255',
            'country'                 => 'nullable|string|max:100',
            'photo'                   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'bio'                     => 'nullable|string',
            'presentation_title'      => 'nullable|string|max:500',
            'presentation_abstract'   => 'nullable|string',
            'order'                   => 'nullable|integer|min:0',
            'is_active'               => 'boolean',
        ]);

        $data = $request->except('photo');
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $request->input('order', 0);

        if (isset($data['bio'])) {
            $data['bio'] = strip_tags($data['bio'], '<p><br><strong><em><ul><ol><li><h1><h2><h3><h4><a><table><thead><tbody><tr><td><th>');
        }
        if (isset($data['presentation_abstract'])) {
            $data['presentation_abstract'] = strip_tags($data['presentation_abstract'], '<p><br><strong><em><ul><ol><li><h1><h2><h3><h4><a><table><thead><tbody><tr><td><th>');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        Speaker::create($data);

        return redirect()->route('admin.speaker.index')
            ->with('success', 'Speaker added successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(Speaker $speaker)
    {
        return view('admin.speaker.edit', compact('speaker'));
    }

    /**
     * Update a speaker.
     */
    public function update(Request $request, Speaker $speaker)
    {
        $request->validate([
            'name'                    => 'required|string|max:255',
            'title'                   => 'nullable|string|max:255',
            'institution'             => 'nullable|string|max:255',
            'country'                 => 'nullable|string|max:100',
            'photo'                   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'bio'                     => 'nullable|string',
            'presentation_title'      => 'nullable|string|max:500',
            'presentation_abstract'   => 'nullable|string',
            'order'                   => 'nullable|integer|min:0',
            'is_active'               => 'boolean',
        ]);

        $data = $request->except('photo');
        $data['is_active'] = $request->boolean('is_active');
        $data['order']     = $request->input('order', $speaker->order);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($speaker->photo) {
                Storage::disk('public')->delete($speaker->photo);
            }
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        $speaker->update($data);

        return redirect()->route('admin.speaker.index')
            ->with('success', 'Speaker updated successfully!');
    }

    /**
     * Delete a speaker.
     */
    public function destroy(Speaker $speaker)
    {
        if ($speaker->photo) {
            Storage::disk('public')->delete($speaker->photo);
        }
        $speaker->delete();

        return redirect()->route('admin.speaker.index')
            ->with('success', 'Speaker deleted successfully!');
    }
}