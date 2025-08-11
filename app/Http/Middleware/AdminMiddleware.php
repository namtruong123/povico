<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}