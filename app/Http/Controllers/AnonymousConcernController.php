<?php

namespace App\Http\Controllers;

use App\Models\AnonymousConcern;
use Illuminate\Http\Request;

class AnonymousConcernController extends Controller
{
    public function create()
    {
        return view('concerns');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'nullable|string|max:100',
            'concern' => 'required|string|max:5000',
        ]);

        AnonymousConcern::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your concern was shared anonymously.',
            ]);
        }

        return redirect()
            ->back()
            ->with('concern_success', 'Your concern was shared anonymously. Thank you for trusting us with it.');
    }
}
