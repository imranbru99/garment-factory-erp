<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = (string) $request->query('lang', $request->session()->get('locale', config('app.locale')));
        if (in_array($locale, ['en', 'bn'], true)) {
            $request->session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
