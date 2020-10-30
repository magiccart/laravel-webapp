@component('mail::message')
# Hello Webapp Test Welcome

your password is
{{ $data['pass'] }}
Please confirm your account before logging in
@component('mail::button', ['url' => $data['link'] ])
Account Confirmation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
