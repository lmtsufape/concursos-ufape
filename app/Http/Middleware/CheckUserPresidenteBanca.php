<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserPresidenteBanca
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
        if (
            Auth::user()->role == User::ROLE_ENUM['presidenteBancaExaminadora']
        ) {
            return $next($request);
        } else {
            return redirect()->back();
        }
        return $next($request);
    }
}
