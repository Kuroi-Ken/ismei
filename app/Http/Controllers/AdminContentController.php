<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\WhatsNewImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminContentController extends Controller
{
    /**
     * Tampilkan halaman edit konten home.
     */
    public function editHome()
    {
        $contents = SiteContent::whereIn('key', [
            'home_theme_quote',
            'home_theme_subtitle',
        ])->pluck('value', 'key');

        $whatsNewImages = WhatsNewImage::orderBy('order')->orderBy('id')->get();

        return view('admin.content.home', compact('contents', 'whatsNewImages'));
    }

    /**
     * Simpan perubahan teks (quote & subtitle).
     */
    public function updateHome(Request $request)
    {
        $request->validate([
            'home_theme_quote'    => 'nullable|string|max:500',
            'home_theme_subtitle' => 'nullable|string|max:200',
        ]);

        foreach (['home_theme_quote', 'home_theme_subtitle'] as $key) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                ['value' => $request->input($key), 'type' => 'text']
            );
        }

        return redirect()->route('admin.content.home')
            ->with('success', 'Konten berhasil diperbarui!');
    }

    /**
     * Upload gambar baru ke What's New (bisa multiple).
     */
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
            ->with('success', 'Gambar berhasil diupload!');
    }

    /**
     * Hapus satu gambar dari What's New.
     */
    public function deleteWhatsNew(WhatsNewImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('admin.content.home')
            ->with('success', 'Gambar berhasil dihapus!');
    }
}