<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewChilds
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        $check = false;
        $query = User::select('id')
            ->where('parent', '=', Auth::id())
            ->unionAll(
                User::select('users.id')
                    ->join('cte', 'cte.id', '=', 'users.parent')
            );
        $childs = DB::table('cte')
            ->withRecursiveExpression('cte', $query)
            ->get()->toArray();
        foreach ($childs as $index => $child) {
            if ($child->id != $id) {
                continue;
            }
            $check = $child->id == $id;
            break;
        }
        if (Auth::check() && ($check || Auth::id() == $id)) {
            return $next($request);
        } else {
            return redirect()->route('users');
        }
    }
}
