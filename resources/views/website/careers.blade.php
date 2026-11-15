@extends('website.layout')
@section('title', 'Careers')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'চাকরি' : 'Careers' }}</h1>
    @forelse ($jobs as $job)
        <article class="card">
            <strong>{{ $job->title ?? $job->name }}</strong>
            <p>{{ $job->body }}</p>
            <p>{{ app()->getLocale()==='bn' ? 'শূন্যপদ' : 'Vacancies' }}: {{ $job->vacancies }}</p>
        </article>
    @empty
        <p>No open jobs.</p>
    @endforelse
    <h2>{{ app()->getLocale()==='bn' ? 'আবেদন' : 'Apply' }}</h2>
    <form method="post" action="{{ url('/careers') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="company_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <p><label>Name<input name="name" required value="{{ old('name') }}"></label></p>
        <p><label>Email<input type="email" name="email" required value="{{ old('email') }}"></label></p>
        <p><label>Phone<input name="phone" value="{{ old('phone') }}"></label></p>
        <p><label>Job
            <select name="job_post_id">
                <option value="">General</option>
                @foreach ($jobs as $job)
                    <option value="{{ $job->id }}">{{ $job->title ?? $job->name }}</option>
                @endforeach
            </select>
        </label></p>
        <p><label>CV<input type="file" name="cv" accept=".pdf,.doc,.docx"></label></p>
        <button type="submit">{{ app()->getLocale()==='bn' ? 'জমা দিন' : 'Submit' }}</button>
    </form>
@endsection
