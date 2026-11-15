@extends('website.layout')
@section('title', 'Request a quote')
@section('content')
    <h1>{{ app()->getLocale()==='bn' ? 'কোট অনুরোধ' : 'Request a quote' }}</h1>
    <form method="post" action="{{ url('/rfq') }}">
        @csrf
        <input type="text" name="company_website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <p><label>Company<input name="company_name" required value="{{ old('company_name') }}"></label></p>
        <p><label>Email<input type="email" name="email" required value="{{ old('email') }}"></label></p>
        <p><label>Phone<input name="phone" value="{{ old('phone') }}"></label></p>
        <p><label>Product
            <input name="product_type" required list="products" value="{{ old('product_type') }}">
            <datalist id="products">
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}"></option>
                @endforeach
            </datalist>
        </label></p>
        <p><label>Quantity<input type="number" name="qty" min="1" required value="{{ old('qty') }}"></label></p>
        <p><label>Target price (cents)<input type="number" name="target_price_minor" min="0" value="{{ old('target_price_minor') }}"></label></p>
        <p><label>Notes<textarea name="notes">{{ old('notes') }}</textarea></label></p>
        <button type="submit">{{ app()->getLocale()==='bn' ? 'পাঠান' : 'Send' }}</button>
    </form>
@endsection
