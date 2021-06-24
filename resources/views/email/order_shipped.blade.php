@component('mail::message')
{{--<h1>Your order has delivered.</h1>--}}
    Dear {{$data['user_name']}}
    {{$data['text']}}

    @component('mail::button', ['url' => route('email')])
        Redirect
    @endcomponent
@endcomponent
