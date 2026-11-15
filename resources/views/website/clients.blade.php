@extends('website.layout')
@section('title', 'Clients')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'ক্রেতা ও কেস স্টাডি' : 'Clients and case studies' }}</h1>
    @forelse ($studies as $study)
        <article class="card"><strong>{{ $study->title ?? $study->name }}</strong><p>{{ $study->buyer_name }}</p><p>{{ $study->body }}</p></article>
    @empty
        <p>Case studies are published from the website module.</p>
    @endforelse
@endsection
