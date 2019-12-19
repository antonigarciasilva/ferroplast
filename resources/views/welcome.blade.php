@if (auth()->user())
@include('home')
@else
@include('auth.login')
@endif