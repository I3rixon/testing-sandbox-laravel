@component('mail::message')
# Welcome!

This is a beautiful Laravel email layout example.

@component('mail::button', ['url' => 'https://example.com'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent