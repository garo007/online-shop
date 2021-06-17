<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        if(\Session::has('locale'))
        {
            \App::setLocale(\Session::get('locale'));
        }
        $langPrefix = ltrim($request->route()->getPrefix(), '/');
        if($langPrefix){
            App::setLocale($langPrefix);
        }
        return $next($request);
    }
}
