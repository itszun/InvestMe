<?php

namespace InvestMe\Http\Middleware;

use Closure;
use InvestMe\Http\Middleware\Authenticate as Auth;

class Admin
{
    protected $level = 3;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user())
        {
            if(auth()->user()->level == $this->level)
            {
                return $next($request);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
}
