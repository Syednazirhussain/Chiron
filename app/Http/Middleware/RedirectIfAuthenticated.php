<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use URL;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 2) {
                $url = URL::to('/trainer/dashboard');
                return \Redirect::to($url);
            }elseif (Auth::user()->role_id == 3) {
                $url = URL::to('/trainee');
                return \Redirect::to($url);
            }elseif (Auth::user()->role_id == 1) {
                $url = URL::to('/admin/home');
                return \Redirect::to($url);
            }
        }
        return $next($request);
    }
}
