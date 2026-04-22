<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Show the detail page for a single information item.
     */
    public function show(string $slug)
    {
        $information = Information::findBySlug($slug);

        // 404 if not found or completely inactive optional item
        if (!$information) {
            abort(404);
        }

        // Optional items that are inactive → 404
        if ($information->type === 'optional' && !$information->is_active) {
            abort(404);
        }

        return view('information-detail', compact('information'));
    }
}