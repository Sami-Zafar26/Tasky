<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!is_null(auth()->user())) {
            if (auth()->user()->restriction==1) {
                auth()->logout();
                return redirect('/');
            }
            else{
                if (auth()->user()->is_admin==1) {
                    return $next($request);
                }else{
                    // return redirect('/all-tasks');
                    return redirect()->back();
                }
            }
        }else{
            return redirect('/');
        }
    }
}
