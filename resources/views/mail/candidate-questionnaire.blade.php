<div>
    <p>Dear {{ $candidate->name }},</p>
    <p>Please click the link below to access the questionnaire:</p>
    <p>
        <a href="{{ route('questionnaire.create', ['candidate_id' => $candidate->id]) }}">
            {{ route('questionnaire.create', ['candidate_id' => $candidate->id]) }}        </a></p>
    <p>Best regards,</p>
    <p>{{ config('app.name') }}</p>
    <p><a href="{{ route('homepage') }}">{{ route('homepage') }}</a></p>
</div>
