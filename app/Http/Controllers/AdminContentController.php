<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
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
        $partnerLogos   = PartnerLogo::orderBy('order')->orderBy('id')->get();

        return view('admin.content.home', compact('contents', 'whatsNewImages', 'partnerLogos'));
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
                    ['key'   => $key],
                    ['value' => $request->input($key) ?? '', 'type' => 'text']
                );
            }
        }

        return redirect()->route('admin.content.home')
            ->with('success', 'Content updated successfully!');
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logos'        => 'required|array|min:1',
            'logos.*'      => 'image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'logo_names'   => 'nullable|array',
            'logo_names.*' => 'nullable|string|max:100',
        ]);

        $order = PartnerLogo::max('order') ?? 0;

        foreach ($request->file('logos') as $index => $file) {
            $path = $file->store('partner-logos', 'public');
            PartnerLogo::create([
                'path'  => $path,
                'name'  => $request->input("logo_names.{$index}") ?? null,
                'order' => ++$order,
            ]);
        }

        return redirect()->route('admin.content.home')
            ->with('success', 'Logo(s) uploaded successfully!');
    }

    public function updateLogoName(Request $request, PartnerLogo $logo)
    {
        $request->validate(['name' => 'nullable|string|max:100']);
        $logo->update(['name' => $request->input('name')]);

        return redirect()->route('admin.content.home')
            ->with('success', 'Logo label updated!');
    }

    public function deleteLogo(PartnerLogo $logo)
    {
        Storage::disk('public')->delete($logo->path);
        $logo->delete();

        return redirect()->route('admin.content.home')
            ->with('success', 'Logo deleted successfully!');
    }

    // ── What's New Images ─────────────────────────────────────────────────────

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

    public function deleteWhatsNew(WhatsNewImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('admin.content.home')
            ->with('success', 'Image deleted successfully!');
    }
}