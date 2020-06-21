<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Suport\Facades\Auth;

class Permission
{

    public $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

}