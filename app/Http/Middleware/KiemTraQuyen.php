<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KiemTraQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $quyen)
    {
        $user = $request->user();

        if (!$user || !$user->tokenCan($quyen)) {
            return response()->json([
                'status' => false,
                'message' => 'Không có quyền truy cập: ' . $quyen,
            ], 403);
        }

        return $next($request);
    }
}
