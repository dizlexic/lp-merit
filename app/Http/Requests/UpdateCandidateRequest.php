<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return (bool) ($user->hasRole('admin') || $user->hasRole('manager'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'slug' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip' => 'nullable|string',
            'picture' => 'nullable|string',
            'elected_position' => 'nullable|string',
            'election_district' => 'nullable|string',
            'election_cycle' => 'nullable|string',
            'source' => 'nullable|string',
            'note' => 'nullable|string',
            'status' => 'nullable|string|in:pending,verified,rejected',
        ];
    }
}
