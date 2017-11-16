@component('mail::message')
# Your account has been created

A new user account has been create for {{ config('app.name') }}. Here is your information.
Keep this information secret.

Username: {{$username}}<br/>
Password: {{$password}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
