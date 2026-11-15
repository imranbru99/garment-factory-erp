<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Padma Apparel')</title>
    <meta name="description" content="@yield('description', 'Woven and knit garment manufacturing in Gazipur, Bangladesh.')">
    <link rel="alternate" hreflang="en" href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}">
    <link rel="alternate" hreflang="bn" href="{{ request()->fullUrlWithQuery(['lang' => 'bn']) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,520;9..144,640&family=Manrope:wght@400;500;600;700&family=Noto+Sans+Bengali:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #16130f;
            --muted: #6f675e;
            --paper: #f4f0e8;
            --white: #fffcf7;
            --line: rgba(22, 19, 15, .12);
            --brand: #8d4318;
            --brand-deep: #5c2b10;
            --gold: #b8905a;
            --shadow: 0 24px 60px rgba(22, 19, 15, .08);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            color: var(--ink);
            background:
                radial-gradient(900px 420px at 100% -10%, rgba(184, 144, 90, .18), transparent 60%),
                var(--paper);
            font-family: Manrope, "Noto Sans Bengali", sans-serif;
            line-height: 1.55;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; }
        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            padding: 16px 32px;
            background: rgba(244, 240, 232, .82);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--line);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: -.03em;
        }
        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--ink);
            color: var(--paper);
            display: grid;
            place-items: center;
            font-family: Fraunces, "Noto Sans Bengali", serif;
            font-size: 16px;
        }
        .brand small { display: block; font-weight: 500; letter-spacing: .16em; text-transform: uppercase; font-size: 10px; color: var(--muted); }
        .site-nav { display: flex; flex-wrap: wrap; align-items: center; gap: 8px 18px; font-size: 14px; font-weight: 600; }
        .site-nav a { color: var(--ink); opacity: .78; }
        .site-nav a:hover { opacity: 1; }
        .lang { display: inline-flex; border: 1px solid var(--line); border-radius: 999px; overflow: hidden; }
        .lang a { padding: 6px 10px; opacity: 1; }
        .lang a.is-active { background: var(--ink); color: var(--paper); }
        .site-main { max-width: 1120px; margin: 0 auto; padding: 40px 24px 96px; }
        .site-main--flush { max-width: none; padding: 0 0 80px; }
        .site-footer {
            display: flex;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
            padding: 28px 32px 40px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 14px;
        }
        .site-footer nav { display: flex; flex-wrap: wrap; gap: 16px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; }
        .card { border: 1px solid var(--line); padding: 16px; background: var(--white); border-radius: 16px; }
        input, textarea, select, button { font: inherit; padding: 12px 14px; width: 100%; border-radius: 12px; border: 1px solid var(--line); background: var(--white); }
        button, .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: auto;
            background: var(--ink);
            color: var(--paper);
            border: 0;
            cursor: pointer;
            padding: 14px 22px;
            border-radius: 999px;
            font-weight: 700;
        }
        .cookie {
            position: fixed;
            left: 16px;
            right: 16px;
            bottom: 16px;
            z-index: 30;
            display: flex;
            gap: 16px;
            align-items: center;
            justify-content: space-between;
            max-width: 720px;
            margin: 0 auto;
            padding: 14px 16px;
            background: var(--ink);
            color: var(--paper);
            border-radius: 16px;
            box-shadow: var(--shadow);
        }
        .cookie button { background: var(--paper); color: var(--ink); }
        .status { background: #eef6df; padding: 12px 16px; border-radius: 12px; }
        @media (max-width: 800px) {
            .site-header, .site-footer { padding-left: 16px; padding-right: 16px; align-items: flex-start; flex-direction: column; }
        }
    </style>
    @stack('head')
    <script type="application/ld+json">
        {"@@context":"https://schema.org","@@type":"Organization","name":"Padma Apparel","url":"{{ url('/') }}","address":{"@@type":"PostalAddress","addressLocality":"Gazipur","addressCountry":"BD"}}
    </script>
</head>
<body class="@yield('body-class')">
<header class="site-header">
    <a class="brand" href="{{ url('/') }}">
        <span class="brand-mark">P</span>
        <span>Padma Apparel<small>Gazipur · since the floor</small></span>
    </a>
    <nav class="site-nav">
        <a href="{{ url('/products') }}">{{ app()->getLocale()==='bn' ? 'পণ্য' : 'Products' }}</a>
        <a href="{{ url('/facility') }}">{{ app()->getLocale()==='bn' ? 'কারখানা' : 'Facility' }}</a>
        <a href="{{ url('/quality') }}">{{ app()->getLocale()==='bn' ? 'মান' : 'Quality' }}</a>
        <a href="{{ url('/compliance') }}">{{ app()->getLocale()==='bn' ? 'সনদ' : 'Compliance' }}</a>
        <a href="{{ url('/careers') }}">{{ app()->getLocale()==='bn' ? 'চাকরি' : 'Careers' }}</a>
        <a href="{{ url('/contact') }}">{{ app()->getLocale()==='bn' ? 'যোগাযোগ' : 'Contact' }}</a>
        <span class="lang">
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" @class(['is-active' => app()->getLocale() === 'en'])>EN</a>
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'bn']) }}" @class(['is-active' => app()->getLocale() === 'bn'])>বাং</a>
        </span>
    </nav>
</header>
<main class="@yield('main-class', 'site-main')">
    @if (session('status'))
        <p class="status">{{ session('status') }}</p>
    @endif
    @yield('content')
</main>
<footer class="site-footer">
    <span>Padma Apparel Group · Tongi, Gazipur</span>
    <nav>
        <a href="{{ url('/privacy') }}">Privacy</a>
        <a href="{{ url('/terms') }}">Terms</a>
        <a href="{{ url('/grievance') }}">Grievance</a>
        <a href="{{ url('/admin') }}">Staff</a>
        <a href="{{ url('/buyer') }}">Buyer</a>
        <a href="{{ url('/supplier/login') }}">Supplier</a>
    </nav>
</footer>
<div class="cookie" id="cookie">
    <span>{{ app()->getLocale()==='bn' ? 'আমরা ভাষা মনে রাখতে একটি সেশন কুকি ব্যবহার করি।' : 'We use a session cookie to remember your language.' }}</span>
    <button type="button" onclick="localStorage.setItem('cookie-ok','1');document.getElementById('cookie').remove();">OK</button>
</div>
<script>
    if (localStorage.getItem('cookie-ok') === '1') document.getElementById('cookie')?.remove();
</script>
</body>
</html>
