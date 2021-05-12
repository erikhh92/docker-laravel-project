@component('mail::message', ['title' => $title])
# Hi!
A new amazing message has been posted!<br>
Now you can read "{{ $title }}" new post in our web.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
