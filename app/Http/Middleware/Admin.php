<?php
// https://hackernoon.com/laravel-multiple-authentication-80daa855322b
// epiEdit hn login
namespace App\Http\Middleware;

use Closure;

class Admin
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
        // epiEdit
        if (auth()->user()->isAdmin == 1 ) {
          return $next($request); // ori
        }

        return redirect('home')->with('error', 'you have not admin access');
    }
}
