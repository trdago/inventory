<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        $rol = Auth::user()->rol_id;
        // dd($rol, Auth::user());
        switch ($rol) 
        {
            case 2:
                return redirect()->to('consul');
                break;
           
            case 0:
                return redirect('unauthorized.', 401);
                break;

        }
        
        return $next($request);
    }
}
