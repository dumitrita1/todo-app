<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        DB::table('stats')->insert([
            'url' => $request->url(),
            'created_at' => now(),
        ]);
    
        return $next($request);
    }
}