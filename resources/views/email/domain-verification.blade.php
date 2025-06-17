@component('mail::message')
# Verify Your Domain

Click the button below to verify your domain **{{ $tenant->subdomain }}** and complete your registration.

@component('mail::button', ['url' => $verificationUrl])
Verify Domain
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
