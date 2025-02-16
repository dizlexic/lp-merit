<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $recent = Candidate::query()->orderBy('created_at', 'desc')->where('verified_by', '!=', null)->limit(6)->get();
        $featured = Candidate::query()->orderBy('created_at', 'desc')->where('verified_by', '!=', null)->limit(8)->get();

        return Inertia::render('HomeView', compact('recent', 'featured'));
    }
}
