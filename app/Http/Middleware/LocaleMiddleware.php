<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق من وجود كوكيز للغة
        $locale = $request->cookie('locale', 'ar'); // 'ar' هي اللغة الافتراضية
        app()->setLocale($locale);

        return $next($request);
    }
}
