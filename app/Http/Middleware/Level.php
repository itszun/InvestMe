<?php

namespace InvestMe\Http\Middleware;

use Closure;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $levelName)
    {
        $userLevel = $request->user()->level;
        if(! $request->user()->hasLevel($levelName, $userLevel))
        {
            return redirect()->to('home');
        }
        return $next($request);
    }
}
