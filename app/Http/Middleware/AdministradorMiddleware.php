<?php

namespace SISAUGES\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use SISAUGES\Http\Requests\Request;

class AdministradorMiddleware
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
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
//        if($this->auth->user()->id_nivel_de_usuario != 1)
//        {
//            dd($this->auth);
//        }
        return $next($request);
    }
}
