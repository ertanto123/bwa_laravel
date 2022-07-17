@component('mail::message')
# Welcome!

Hi {{ $user->name }}
<br>
Welcome to S'watch, your account has been created successfully, Now you can choose your best watch!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
