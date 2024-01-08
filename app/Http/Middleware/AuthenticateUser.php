<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
  
    public function handle(Request $request, Closure $next): Response
    {
      
       if (Auth::check()) {
       
        if ($request->session()->has('username')) {
            return $next($request);
        }
    }

  
    return redirect()->route('login');
    }
}
