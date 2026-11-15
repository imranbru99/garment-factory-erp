@extends('website.layout')
@section('title', 'Padma Apparel — Knit and woven garments')
@section('description', 'Export knit and woven garments from Gazipur. Sewing, wash and embroidery under one group.')
@section('body-class', 'is-home')
@section('main-class', 'site-main site-main--flush')

@push('head')
<style>
    .hero {
        display: grid;
        grid-template-columns: minmax(0, 1.25fr) minmax(280px, .85fr);
        gap: 48px;
        align-items: center;
        min-height: min(820px, calc(100vh - 76px));
        padding: 56px 7vw 72px;
    }
    .hero > * { min-width: 0; }
    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin: 0 0 22px;
        letter-spacing: .18em;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 700;
        color: var(--brand);
    }
    .eyebrow:before { content: ""; width: 36px; height: 1px; background: var(--gold); }
    .hero h1 {
        margin: 0;
        max-width: 11ch;
        font-family: Fraunces, "Noto Sans Bengali", serif;
        font-size: clamp(44px, 5.6vw, 78px);
        overflow-wrap: break-word;
        font-weight: 520;
        letter-spacing: -.045em;
        line-height: .92;
    }
    .lede { max-width: 46ch; margin: 24px 0 0; font-size: 18px; color: var(--muted); }
    .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 32px; }
    .btn-ghost { background: transparent; color: var(--ink); border: 1px solid var(--line); }
    .hero-panel {
        position: relative;
        overflow: hidden;
        min-height: 460px;
        padding: 28px;
        border-radius: 28px;
        color: #f6f1e8;
        background:
            radial-gradient(400px 220px at 80% 0%, rgba(184, 144, 90, .45), transparent 60%),
            linear-gradient(160deg, #2a241d 0%, #12100e 70%);
        box-shadow: var(--shadow);
    }
    .hero-panel p { margin: 0; color: rgba(246, 241, 232, .72); }
    .hero-panel strong {
        display: block;
        margin-top: 80px;
        font-family: Fraunces, "Noto Sans Bengali", serif;
        font-size: 42px;
        font-weight: 520;
        letter-spacing: -.03em;
        line-height: 1;
    }
    .metric-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 28px; }
    .metric { padding-top: 14px; border-top: 1px solid rgba(246, 241, 232, .16); }
    .metric b { display: block; font-size: 28px; letter-spacing: -.04em; }
    .metric span { color: rgba(246, 241, 232, .65); font-size: 12px; letter-spacing: .08em; text-transform: uppercase; }
    .band { padding: 18px 7vw; border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); overflow: hidden; }
    .marquee { display: flex; gap: 42px; white-space: nowrap; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; font-size: 13px; color: var(--muted); }
    .section { padding: 88px 7vw; }
    .section-head { display: flex; justify-content: space-between; gap: 24px; align-items: end; margin-bottom: 28px; }
    .section h2 {
        margin: 0;
        font-family: Fraunces, "Noto Sans Bengali", serif;
        font-size: clamp(36px, 4vw, 56px);
        font-weight: 520;
        letter-spacing: -.04em;
        line-height: .95;
    }
    .section-head p { max-width: 36ch; margin: 0; color: var(--muted); }
    .products { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .product {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 220px;
        padding: 22px;
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: 22px;
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .product:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
    .product em { font-style: normal; color: var(--gold); font-weight: 700; letter-spacing: .12em; font-size: 12px; }
    .product strong { font-family: Fraunces, "Noto Sans Bengali", serif; font-size: 32px; font-weight: 520; letter-spacing: -.03em; }
    .product span { color: var(--muted); }
    .process { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--line); border: 1px solid var(--line); border-radius: 24px; overflow: hidden; }
    .step { background: var(--white); padding: 28px; min-height: 180px; }
    .step b { display: block; color: var(--gold); letter-spacing: .14em; font-size: 12px; }
    .step strong { display: block; margin: 18px 0 8px; font-family: Fraunces, "Noto Sans Bengali", serif; font-size: 28px; font-weight: 520; }
    .step p { margin: 0; color: var(--muted); }
    .certs { display: flex; flex-wrap: wrap; gap: 10px; }
    .certs a, .certs span { padding: 12px 16px; border-radius: 999px; background: var(--white); border: 1px solid var(--line); font-weight: 700; }
    .news { display: grid; gap: 0; }
    .news a { display: grid; grid-template-columns: 120px 1fr auto; gap: 20px; align-items: center; padding: 22px 0; border-top: 1px solid var(--line); }
    .news a:hover strong { color: var(--brand); }
    .news time { color: var(--muted); font-size: 13px; letter-spacing: .08em; text-transform: uppercase; }
    .close {
        margin: 0 7vw 20px;
        padding: 56px;
        border-radius: 32px;
        color: #f6f1e8;
        background: #16130f;
        display: flex;
        justify-content: space-between;
        gap: 24px;
        align-items: end;
    }
    .close h2 { margin: 0; font-family: Fraunces, "Noto Sans Bengali", serif; font-size: clamp(40px, 5vw, 68px); font-weight: 520; letter-spacing: -.04em; line-height: .92; max-width: 10ch; }
    .close .btn { background: #f6f1e8; color: #16130f; }
    @media (max-width: 1080px) {
        .hero, .products, .process, .news a, .close { grid-template-columns: 1fr; display: grid; }
        .hero { min-height: auto; padding-top: 28px; }
        .hero-panel strong { margin-top: 28px; }
        .close { display: grid; margin-left: 16px; margin-right: 16px; padding: 32px; }
        .section { padding: 56px 16px; }
        .band { padding-left: 16px; padding-right: 16px; }
    }
</style>
@endpush

@section('content')
@php
    $bn = app()->getLocale() === 'bn';
    $fallback = [
        ['name' => 'Basic tee', 'slug' => null, 'summary' => $bn ? 'প্রতিদিনের জার্সি।' : 'Everyday jersey.'],
        ['name' => 'Polo', 'slug' => null, 'summary' => $bn ? 'পিকে ও টিপ।' : 'Pique and tip.'],
        ['name' => 'Shirt', 'slug' => null, 'summary' => $bn ? 'ওভেন শার্ট।' : 'Woven shirts.'],
        ['name' => 'Denim', 'slug' => null, 'summary' => $bn ? 'পাঁচ পকেট।' : 'Five-pocket programs.'],
        ['name' => 'Jacket', 'slug' => null, 'summary' => $bn ? 'হালকা আউটার।' : 'Light outerwear.'],
        ['name' => 'Kids', 'slug' => null, 'summary' => $bn ? 'শিশু পরিধান।' : 'Children’s wear.'],
    ];
    $shown = $categories->isNotEmpty() ? $categories : collect($fallback);
@endphp
<section class="hero">
    <div>
        <p class="eyebrow">{{ $bn ? 'গাজীপুর · নিট ও ওভেন' : 'Gazipur · Knit and woven' }}</p>
        <h1>{{ $bn ? 'যে কারখানা সময়মতো জাহাজ ছাড়ে।' : 'The factory that ships the date it promises.' }}</h1>
        <p class="lede">{{ $bn ? 'সেলাই, ওয়াশ ও এমব্রয়ডারি এক ছাদের নিচে। ক্রেতার পো থেকে কার্টন পর্যন্ত একই সিস্টেমে।' : 'Sewing, wash and embroidery on one campus. From buyer PO to packed carton, the floor and the office share one record.' }}</p>
        <div class="hero-actions">
            <a class="btn" href="{{ url('/rfq') }}">{{ $bn ? 'কোট চাই' : 'Request a quote' }}</a>
            <a class="btn btn-ghost" href="{{ url('/facility') }}">{{ $bn ? 'কারখানা দেখুন' : 'See the floor' }}</a>
        </div>
    </div>
    <aside class="hero-panel">
        <p>{{ $bn ? 'লাইভ সক্ষমতা' : 'Live capacity' }}</p>
        <strong>{{ $bn ? 'এক্সপোর্টের জন্য তৈরি।' : 'Built for export programs.' }}</strong>
        <div class="metric-row">
            <div class="metric"><b>{{ $lines > 0 ? $lines : 10 }}</b><span>{{ $bn ? 'সেলাই লাইন' : 'Sewing lines' }}</span></div>
            <div class="metric"><b>{{ $units > 0 ? $units : 3 }}</b><span>{{ $bn ? 'ইউনিট' : 'Units' }}</span></div>
            <div class="metric"><b>{{ $workers > 0 ? number_format($workers) : '600' }}</b><span>{{ $bn ? 'কর্মী' : 'People' }}</span></div>
        </div>
    </aside>
</section>
<div class="band">
    <div class="marquee">
        <span>Cutting</span><span>Sewing</span><span>Wash</span><span>Embroidery</span><span>Print</span><span>Finishing</span><span>AQL inspection</span><span>Packing</span>
        <span>Cutting</span><span>Sewing</span><span>Wash</span><span>Embroidery</span><span>Print</span><span>Finishing</span>
    </div>
</div>
<section class="section">
    <div class="section-head">
        <h2>{{ $bn ? 'যা আমরা সেলাই করি' : 'What we cut and sew' }}</h2>
        <p>{{ $bn ? 'ক্যাটাগরি অনুযায়ী এমওকিউ ও লিড টাইম।' : 'MOQ and lead time live on each category page.' }}</p>
    </div>
    <div class="products">
        @foreach ($shown->take(6) as $index => $category)
            @php $slug = data_get($category, 'slug'); @endphp
            <a class="product" href="{{ $slug ? url('/products/'.$slug) : url('/products') }}">
                <em>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</em>
                <strong>{{ data_get($category, 'name') }}</strong>
                <span>
                    @if (data_get($category, 'moq'))
                        MOQ {{ number_format((int) data_get($category, 'moq')) }} · {{ data_get($category, 'lead_days') }} {{ $bn ? 'দিন' : 'days' }}
                    @else
                        {{ data_get($category, 'summary') ?: ($bn ? 'বিস্তারিত দেখুন' : 'View the program') }}
                    @endif
                </span>
            </a>
        @endforeach
    </div>
</section>
<section class="section" style="padding-top:0">
    <div class="section-head">
        <h2>{{ $bn ? 'মেঝে থেকে কার্টন' : 'From floor to carton' }}</h2>
        <p>{{ $bn ? 'প্রতিটি ধাপ একই অর্ডারে বাঁধা।' : 'Every stage stays attached to the same order.' }}</p>
    </div>
    <div class="process">
        <article class="step"><b>01</b><strong>{{ $bn ? 'কাটিং' : 'Cutting' }}</strong><p>{{ $bn ? 'মার্কার, লে ও বান্ডিল কিউআর।' : 'Marker, lay and QR bundles.' }}</p></article>
        <article class="step"><b>02</b><strong>{{ $bn ? 'সেলাই' : 'Sewing' }}</strong><p>{{ $bn ? 'ঘণ্টায় লক্ষ্য বনাম আউটপুট।' : 'Hourly target against output.' }}</p></article>
        <article class="step"><b>03</b><strong>{{ $bn ? 'ওয়াশ' : 'Wash' }}</strong><p>{{ $bn ? 'রেসিপি ও শেড অনুমোদন।' : 'Recipe and shade approval.' }}</p></article>
        <article class="step"><b>04</b><strong>{{ $bn ? 'এমব্রয়ডারি' : 'Embroidery' }}</strong><p>{{ $bn ? 'ইন-হাউস ও সাবকন্ট্রাক্ট।' : 'In-house and subcontract.' }}</p></article>
        <article class="step"><b>05</b><strong>{{ $bn ? 'ফিনিশিং' : 'Finishing' }}</strong><p>{{ $bn ? 'রেশিও প্যাক ও কার্টন।' : 'Ratio pack and carton scan.' }}</p></article>
        <article class="step"><b>06</b><strong>{{ $bn ? 'মান' : 'Quality' }}</strong><p>{{ $bn ? 'একিউএল ২.৫ ফাইনাল।' : 'AQL final before the gate.' }}</p></article>
    </div>
</section>
<section class="section" style="padding-top:0">
    <div class="section-head">
        <h2>{{ $bn ? 'সনদপত্র' : 'On the wall' }}</h2>
        <a href="{{ url('/compliance') }}">{{ $bn ? 'সব দেখুন' : 'Full register' }}</a>
    </div>
    <div class="certs">
        @forelse ($certificates as $certificate)
            <a href="{{ url('/compliance') }}">{{ $certificate->standard ?: $certificate->name }}</a>
        @empty
            <span>WRAP</span><span>Fire licence</span><span>OEKO-TEX ready</span><span>Buyer CoC</span>
        @endforelse
    </div>
</section>
<section class="section" style="padding-top:0">
    <div class="section-head">
        <h2>{{ $bn ? 'খবর' : 'From the mill' }}</h2>
        <a href="{{ url('/news') }}">{{ $bn ? 'আর্কাইভ' : 'Archive' }}</a>
    </div>
    <div class="news">
        @forelse ($news as $post)
            <a href="{{ url('/news/'.$post->slug) }}">
                <time>{{ optional($post->published_at)->timezone('Asia/Dhaka')->format('d M Y') }}</time>
                <strong>{{ $post->title ?? $post->name }}</strong>
                <span>→</span>
            </a>
        @empty
            <a href="{{ url('/news') }}"><time>{{ $bn ? 'শীঘ্রই' : 'Soon' }}</time><strong>{{ $bn ? 'কারখানার খবর এখানে প্রকাশ হবে।' : 'Mill notes are published from the office.' }}</strong><span>→</span></a>
        @endforelse
    </div>
</section>
<section class="close">
    <h2>{{ $bn ? 'পরের প্রোগ্রামটা এখানে কাটুন।' : 'Cut the next program here.' }}</h2>
    <a class="btn" href="{{ url('/rfq') }}">{{ $bn ? 'মার্চেন্ডাইজারকে লিখুন' : 'Talk to a merchandiser' }}</a>
</section>
@endsection
