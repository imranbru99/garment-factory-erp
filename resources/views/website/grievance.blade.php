@extends('website.layout')
@section('title', 'Grievance')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'অভিযোগ' : 'Grievance and whistleblowing' }}</h1>
    <p>{{ app()->getLocale()==='bn' ? 'এই বার্তা গোপন থাকে।' : 'This report is stored as confidential and is not shown on the public site.' }}</p>
    <form method="post" action="{{ url('/grievance') }}">
        @csrf
        <input type="text" name="company_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <p><label>Channel<input name="channel" value="website"></label></p>
        <p><label>Report<textarea name="body" required></textarea></label></p>
        <button type="submit">{{ app()->getLocale()==='bn' ? 'জমা দিন' : 'Submit' }}</button>
    </form>
@endsection
