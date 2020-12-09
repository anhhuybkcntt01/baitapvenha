<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
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
        $name = $request->cookie('username');
        $routeName = $request->route()->getName();

        if (isset($name))
        {
            if ($routeName == 'login'){
                return redirect()->route('post.create');
            } else {
                return $next($request);
            }

        }
        if ($routeName == 'login'){
            return $next($request);
            } else {
            return  redirect('/login');
        }
    }
}
