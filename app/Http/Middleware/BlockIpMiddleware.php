<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BlockIpMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $blocked = DB::table('blocked_ips')
            ->where('ip', $request->ip())
            ->where('blocked_until', '>', now())
            ->exists();

        if ($blocked) {
            abort(403, '🚫 Your IP has been blocked due to suspicious activity.');
        }

        return $next($request);
    }
}
