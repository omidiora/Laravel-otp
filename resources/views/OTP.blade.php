@component('mail::message')
# Introduction

Yout otp is {{$OTP}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
