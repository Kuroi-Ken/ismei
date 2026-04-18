<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use App\Models\WhatsNewImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminContentController extends Controller
{
    public function editHome()
    {
        $contents = SiteContent::whereIn('key', [
            'home_theme_quote',
            'home_theme_subtitle',
            'home_stat2_value',
            'home_stat2_label',
            'home_stat3_value',
            'home_stat3_label',
        ])->pluck('value', 'key');

        $whatsNewImages = WhatsNewImage::orderBy('order')->orderBy('id')->get();

        return view('admin.content.home', compact('contents', 'whatsNewImages'));
    }

    public function updateHome(Request $request)
    {
        $request->validate([
            'home_theme_quote'    => 'nullable|string|max:500',
            'home_theme_subtitle' => 'nullable|string|max:200',
            'home_stat2_value'    => 'nullable|string|max:50',
            'home_stat2_label'    => 'nullable|string|max:100',
            'home_stat3_value'    => 'nullable|string|max:50',
            'home_stat3_label'    => 'nullable|string|max:100',
        ]);

        $keys = [
            'home_theme_quote',
            'home_theme_subtitle',
            'home_stat2_value',
            'home_stat2_label',
            'home_stat3_value',
            'home_stat3_label',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                SiteContent::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $request->input($key) ?? '', // Paksa jadi string kosong jika null
                        'type' => 'text'
                    ]
                );
            }
        }

        return redirect()->route('admin.content.home')
            ->with('success', 'Content updated successfully!');
    }

    public function uploadWhatsNew(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $order = WhatsNewImage::max('order') ?? 0;

        foreach ($request->file('images') as $file) {
            $path = $file->store('whats-new', 'public');
            WhatsNewImage::create([
                'path'  => $path,
                'order' => ++$order,
            ]);
        }

        return redirect()->route('admin.content.home')
            ->with('success', 'Images uploaded successfully!');
    }

    /**
     * Delete a single image from What's New.
     */
    public function deleteWhatsNew(WhatsNewImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('admin.content.home')
            ->with('success', 'Image deleted successfully!');
    }
}