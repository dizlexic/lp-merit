<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CandidateListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->input('itemsPerPage', 10);
        $candidates = Candidate::query()->paginate($perPage > 100 ? 100 : $perPage);

        return Inertia::render('Manage/CandidateList', compact('candidates'));
    }
}
