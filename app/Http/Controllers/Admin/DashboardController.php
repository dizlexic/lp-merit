<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $total = Candidate::query()->count();
        $recent = Candidate::query()->orderBy('updated_at', 'desc')->limit(5)->get();
        $unverified = Candidate::query()->where('verified_by', null)->count();

        return Inertia::render(
            'Admin/DashboardView',
            compact('recent', 'total', 'unverified')
        );
    }
}
