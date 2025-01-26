<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'string|max:255',
        ]);

        $per_page = 12;

        $query = Candidate::query();
        $search = $request->search;

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        $results = $query->paginate($per_page)->through(function ($candidate) {
            return [
                'id' => $candidate->id,
                'name' => $candidate->name,
                'email' => $candidate->email,
                'phone' => $candidate->phone,
                'address' => $candidate->address,
                'city' => $candidate->city,
                'state' => $candidate->state,
                'zip' => $candidate->zip,
                'elected_position' => $candidate->elected_position,
                'election_district' => $candidate->election_district,
                'election_cycle' => $candidate->election_cycle,
                'source' => $candidate->source,
                'notes' => $candidate->notes,
                'picture' => $candidate->picture,
                'slug' => $candidate->slug,
            ];
        });

        return Inertia::render('SearchView', compact('search', 'results'));
    }
}
