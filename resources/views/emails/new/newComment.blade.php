@component('mail::message')
# New Comment Alert
<div class="well">
{{$comment}}
</div>

<div class="well">
From: {{$email}}
</div>


Comment From,<br>
{{ config('app.name') }}
@endcomponent
