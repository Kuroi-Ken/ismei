<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Show the informations listing page with search and pagination.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $announcements = Information::published()
            ->search($keyword)
            ->Paginate(9)
            ->withQueryString();

        return view('information', compact('announcements', 'keyword'));
    }

    /**
     * Show the detail page for a single information item.
     */
    public function show(string $slug)
    {
        $information = Information::findBySlug($slug);

        // 404 if not found
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