<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            $userLogado = Auth::user();
            $user = [
                "name"      => $userLogado->name,
                "email"     => $userLogado->email
            ];
            return redirect()->route('user.logar')->compact($user);
        }
        return $next($request);
    }
}
