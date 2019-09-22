<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!empty(Session::get('name'))) {
            return $next($request);
        }
        return redirect('/error');
    }
}
