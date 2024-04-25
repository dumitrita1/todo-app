<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class HasRole
{
    public function handle($request, Closure $next, string $role = 'admin')
    {
        $user = User::current();

        if (! $user || $user->role !== $role) {
            $this->unauthorized();
        }

        return $next($request);
    }

    protected function unauthorized()
    {
        throw new AuthenticationException('Unauthenticated.', [], route('home'));
    }
}