<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('x-localization') && in_array($request->header('x-localization'), config('app.locales'))) {
            app()->setLocale($request->header('x-localization'));
            return $next($request);
        } else {
            throw ValidationException::withMessages(['locale' => __("Un Supported Locale")]);
        }
    }
}
