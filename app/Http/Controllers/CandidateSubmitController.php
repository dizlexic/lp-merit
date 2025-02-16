<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateSubmitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {}

    public function store(Request $request)
    {
        dd($request->all());
    }
}
