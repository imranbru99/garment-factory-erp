<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; margin: 24px; color: #111; }
        h1 { font-size: 20px; }
        table { width: 100%; border-collapse: collapse; }
        td { border-bottom: 1px solid #ddd; padding: 4px 6px; vertical-align: top; font-size: 12px; }
        .muted { color: #555; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p class="muted">{{ $bangla_date }} · {{ $table }}</p>
    <table>
        @foreach ($rows as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ is_scalar($value) || $value === null ? $value : json_encode($value) }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
