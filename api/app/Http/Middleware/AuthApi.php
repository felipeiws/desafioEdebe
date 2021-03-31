<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headers = getallheaders();
        if(empty($headers['Authorization'])){
            return response()->json(['error'=>'You do not have permission to access!'],401);
        }
        return $next($request);
    }
}
