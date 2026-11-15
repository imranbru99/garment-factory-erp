@extends('website.layout')
@section('title', 'News')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'খবর' : 'News' }}</h1>
    @forelse ($posts as $post)
        <p><a href="{{ url('/news/'.$post->slug) }}">{{ $post->title ?? $post->name }}</a></p>
    @empty
        <p>No posts yet.</p>
    @endforelse
@endsection
