@component('mail::message')
# {{ $mailData['subject'] }}
# {{ $mailData['title'] }}

@component('mail::button', ['url' => $mailData['url']])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent