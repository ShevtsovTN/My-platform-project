<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteUsers
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
        if (Auth::id() != $request->id) {
            return $next($request);
        } else {
            $request->session()->flash('error', 'You cannot delete yourself');
            return redirect()->route('users');
        }
    }
}
