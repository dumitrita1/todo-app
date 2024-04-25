<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class Password
{
    public function handle($request, Closure $next, string $password)
    {
        if (request('password') !== $password) {
            $this->unauthorized();
        }

        return $next($request);
    }

    protected function unauthorized()
    {
        throw new AuthenticationException('Unauthenticated.', [], route('home'));
    }
}
