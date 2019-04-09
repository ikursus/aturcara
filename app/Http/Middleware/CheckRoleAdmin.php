<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleAdmin
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
        # Semak adakah user yang login mempunyai role admin
        if ( $request->user()->role != 'admin' )
        {
            return redirect()->route('home')
            ->with('alert-error', 'Anda tidak mempunyai akses yang sah.');
        }
        # Jika tiada masalah dengan role, teruskan aktiviti
        return $next($request);
    }
}
