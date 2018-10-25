<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfEmailNotConfirmed
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
        if (! $request->user()->confirmed) {
            $email = auth()->user()->email;
            \Auth::logout();
            return redirect('/')->with('confirm-email', $email);
        }

        return $next($request);
    }
}
