@extends('website.layout')
@section('title', 'FAQ')
@section('content')
    <h1>FAQ</h1>
    @forelse ($faqs as $faq)
        <article class="card"><strong>{{ $faq->question }}</strong><p>{{ $faq->answer }}</p></article>
    @empty
        <p>MOQ depends on the product. A basic tee is usually 3,000 pieces per color.</p>
    @endforelse
@endsection
