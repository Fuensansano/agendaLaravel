@component('mail::message')
# Introduction

User <span class="text-info"> {{ $fromUser }} </span> shared contact <span class="text-info"> {{ $sharedContact }} </span> with you.

@component('mail::button', ['url' => route('contact-shares.index')])
See here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
