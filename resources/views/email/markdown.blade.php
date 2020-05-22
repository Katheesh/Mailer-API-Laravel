@component('mail::message')
# {{ $details['title'] }}

{{date('Y.m.d H:m:s')}}
<hr>
{{ $details['body'] }}

@component('mail::button', ['url' => '#'])
View n browser
@endcomponent

Thanks for using,<br>
<img src="https://gitleaf.com/img/logo.png" alt="logo" height="36"><br/>
@endcomponent
