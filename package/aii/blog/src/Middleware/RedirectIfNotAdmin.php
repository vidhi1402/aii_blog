<?php

namespace Aii\Blog\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='blog_admin')
    {
        if(!Auth::guard($guard)->check()){
            return redirect()->route('blog.auth.login');
        }
        return $next($request);
    }
}
