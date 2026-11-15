@extends('website.layout')
@section('title', 'Contact')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'যোগাযোগ' : 'Contact' }}</h1>
    @foreach ($units as $unit)
        <p><strong>{{ $unit->name }}</strong> {{ $unit->address }}</p>
    @endforeach
    <p><a href="https://wa.me/8801700000000">WhatsApp</a></p>
    <form method="post" action="{{ url('/contact') }}">
        @csrf
        <input type="text" name="company_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <p><label>Name<input name="name" required></label></p>
        <p><label>Email<input type="email" name="email" required></label></p>
        <p><label>Phone<input name="phone"></label></p>
        <p><label>Subject<input name="subject" required></label></p>
        <p><label>Message<textarea name="body" required></textarea></label></p>
        <button type="submit">Send</button>
    </form>
@endsection
