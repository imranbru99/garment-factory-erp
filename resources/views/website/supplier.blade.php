@extends('website.layout')
@section('title', 'Supplier registration')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'সরবরাহকারী নিবন্ধন' : 'Supplier registration' }}</h1>
    <form method="post" action="{{ url('/suppliers/register') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="company_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <p><label>Company<input name="name" required></label></p>
        <p><label>Email<input type="email" name="email" required></label></p>
        <p><label>Phone<input name="phone"></label></p>
        <p><label>Category<input name="category" placeholder="fabric, trims, packing"></label></p>
        <p><label>Trade licence<input type="file" name="document" accept=".pdf,.jpg,.png"></label></p>
        <button type="submit">Register</button>
    </form>
@endsection
