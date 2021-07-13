<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleCheck
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
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return $next($request);
            }
            if (Auth::user()->role_id == 2) {
                return $next($request);
            }
            if (Auth::user()->role_id == 3) {
                if (Route::currentRouteName() == 'register') {
                    session()->flash('error', 'Acesso negado');
                    return redirect()->route('home');
                }
                return $next($request);
            }
            if (Auth::user()->role_id == 4) {
                session()->flash('error', 'Acesso negado');
                return redirect()->route('home');
            }
        }
    }
}
