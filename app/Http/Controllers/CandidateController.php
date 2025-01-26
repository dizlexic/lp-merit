<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\RateLimiter;
use App\Mail\CandidateQuestionnaire;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request)
    {
        $year = $request->year;
        $slug = $request->route()->parameter('slug');

        $candidate = Candidate::where('slug', $slug)->firstOrFail();
        return Inertia::render('DetailView', compact('candidate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CandidateSubmit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $executed = RateLimiter::attempt(
            'submit-candidate:'.$request->ip(),
            $perMinute = 5,
            function() use ($request) {
                $validated = $request->validated();
                $picture = $request->file('picture')->store('public/candidates');
                $source = 'web';
                $candidate = Candidate::create(array_merge($validated, compact('picture', 'source')));
                Mail::to($request->email)->send(new CandidateQuestionnaire($candidate));
            }
        );

        if (! $executed) {
            return back()->withErrors(['message' => 'Too many requests. Please try again later.']);
        }

        return back()->with('message', 'Thank you for your submission!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate): Response
    {
        Inertia::render('CandidateDetail', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        Inertia::render('CandidateEdit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $validated = $request->validated();
        $candidate->update($validated);

        return back()->with('message', 'Candidate updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
