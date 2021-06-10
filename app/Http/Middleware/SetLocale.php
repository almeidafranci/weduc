<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($user = Auth::user()) {
            App::setLocale($user->locale);
        } else {
            App::setLocale($request->getPreferredLanguage(['en', 'pt_BR']));
        }

        return $next($request);
    }
}
