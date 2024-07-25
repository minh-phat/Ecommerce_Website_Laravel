<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // get language from session
       $language = session('locale', 'vi');

       // Nếu header có ngôn ngữ, thiết lập ngôn ngữ cho ứng dụng
       if ($language  && in_array($language, ['en', 'vi']) ) {
         // set application locale
           App::setLocale($language);
       }

       return $next($request);
    }
}
