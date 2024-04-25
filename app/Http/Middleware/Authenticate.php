<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as BaseMiddleware;

class Authenticate extends BaseMiddleware
{
    // Schlechtes Beispiel zum überschreiben von Basis-Methoden:
    // protected function unauthenticated($request, array $guards)
    // {
    //     throw new AuthenticationException(
    //         'Unauthenticated.',
    //         $guards,
    //         route('home'),
    //     );
    // }
}