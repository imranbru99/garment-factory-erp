@extends('website.layout')
@section('title', $page->seo_title ?? $page->title ?? $page->name)
@section('description', $page->seo_description ?? '')
@section('content')
    <h1>{{ $page->title ?? $page->name }}</h1>
    <div>{!! nl2br(e($page->body ?? '')) !!}</div>
@endsection
