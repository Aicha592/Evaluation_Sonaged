<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
// Middleware personnalisé AdminMiddleware
public function handle($request, Closure $next)
{
    if (!auth()->user() || auth()->user()->type_utilisateur !== 'admin') {
        return redirect()->route('login')->with('error', 'Access denied');
    }

    return $next($request);
}

}

