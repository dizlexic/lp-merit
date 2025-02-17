<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManageCandidateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Candidate $candidate)
    {
        return Inertia::render('Manage/CandidateManagement', compact('candidate'));
    }

    public function authorize()
    {
        return $this->user()->hasAnyRole('admin', 'manager');
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());
        $candidate->updated_by = $this->user()->id;

        if ($request->has('status') && $request->status === 'verified') {
            $candidate->verified_by = $this->user()->id;
            $candidate->save();
        }

        return redirect()->route('manage.candidate', $candidate);
    }
}
