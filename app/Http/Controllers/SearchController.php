<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchRequest $request)
    {
        $per_page = 12;

        $query = Candidate::query();

        if ($request->validated()) {
            $query->where('name', 'like', '%'.$request->validated()['search'].'%');
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

        if ($request->validated()) {
            $results->appends(['search' => $request->validated()['search']]);
        }

        return Inertia::render('SearchView', compact('results'));
    }
}
