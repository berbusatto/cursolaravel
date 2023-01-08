<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFirstMiddleware
{
    private $users;
    public function __construct(User $user)
    {
        $this->users = $user;
    }

    public function handle(Request $request, Closure $next, $role)
    {
        // MIDDLEWARE DE AUTENTICAÇÃO
        // PODE OCORRER NA REQUEST OU NA RESPONSE.

        // NA REQUEST
        // if(!Auth::check())
        // {
        //      return $next($request);
        // }

        // NA RESPONSE
        $response = $next($request);
        // QUALQUER VALIDAÇÃO
        if($this->users->count() === 8)
        {
            return $response;
        }
        dd('Existem mais ou menos de 8 usuarios');

    }
}
