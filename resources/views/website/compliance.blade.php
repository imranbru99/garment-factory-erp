@extends('website.layout')
@section('title', 'Compliance')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'সনদপত্র' : 'Certifications' }}</h1>
    @forelse ($certificates as $certificate)
        <article class="card">
            <strong>{{ $certificate->name }}</strong>
            <div>{{ $certificate->standard }} · {{ $certificate->certificate_no }}</div>
            <div>{{ app()->getLocale()==='bn' ? 'মেয়াদ' : 'Valid until' }} {{ $certificate->expires_on }}</div>
        </article>
    @empty
        <p>Public certificates are flagged in the compliance register.</p>
    @endforelse
@endsection
