@extends('website.layout')
@section('title', 'Products')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'পণ্য ও সক্ষমতা' : 'Products and capabilities' }}</h1>
    <div class="grid">
        @forelse ($categories as $category)
            <a class="card" href="{{ url('/products/'.$category->slug) }}">
                <strong>{{ $category->name }}</strong>
                <div>{{ $category->summary }}</div>
                <div>MOQ {{ $category->moq }} · {{ $category->lead_days }} days</div>
            </a>
        @empty
            <p>Categories are edited in the website module.</p>
        @endforelse
    </div>
@endsection
