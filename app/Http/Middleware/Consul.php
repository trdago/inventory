<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Consul
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
        $rol = Auth::user()->rol_id;
        switch ($rol) 
        {
            case 1:
                return redirect()->to('admin');
                break;

            case 0:
                return redirect('unauthorized.', 401);
                break;

            
        }
        return $next($request);
    }
}
