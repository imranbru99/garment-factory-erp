@extends('website.layout')
@section('title', 'Downloads')
@section('content')
    <h1>Downloads</h1>
    @forelse ($items as $item)
        <p>{{ $item->title ?? $item->name }} @if($item->file_path) — {{ $item->file_path }} @endif</p>
    @empty
        <p>Company profile and certificates are uploaded from the admin.</p>
    @endforelse
@endsection
