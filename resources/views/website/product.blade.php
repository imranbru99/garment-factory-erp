@extends('website.layout')
@section('title', $category->name)
@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->summary }}</p>
    <p>MOQ {{ $category->moq }}. Lead time {{ $category->lead_days }} days.</p>
    <p><a href="{{ url('/rfq') }}">{{ app()->getLocale()==='bn' ? 'এই পণ্যের কোট চাই' : 'Request a quote for this product' }}</a></p>
@endsection
