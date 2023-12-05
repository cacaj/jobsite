<x-mail::message>

    Congratulations, {{ $name }}! <br>
    You have been shortlisted for a job titled {{ $title }}. Please be ready for the interview.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
