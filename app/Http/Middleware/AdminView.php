<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminView
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->group == 0) {
            return $next($request);
        } else {
            $request->session()->flash('error', 'No access to this functionality');
            return redirect()->route('messagesList');
        }
    }
}
