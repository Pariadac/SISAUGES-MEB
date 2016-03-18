<?php

namespace SISAUGES\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use SISAUGES\Http\Requests\Request;

class SuperuserMiddleware
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
        if($this->auth->user())
        {
            if($this->auth->user()->nivelUsuarios->keyBy('id_nivel_de_usuario')->has(1) != true)
            {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
