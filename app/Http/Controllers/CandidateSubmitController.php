<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class CandidateSubmitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('CandidateSubmit');
    }

    public function store(Request $request)
    {
        //
        dd($request->all());
    }
}
