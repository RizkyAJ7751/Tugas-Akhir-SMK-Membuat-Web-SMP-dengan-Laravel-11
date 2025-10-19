<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckBlockedIp
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        $blocked = DB::table('blocked_ips')
            ->where('ip', $ip)
            ->where('blocked_until', '>', now())
            ->first();

        if ($blocked) {
            abort(403, '🚫 Your IP is blocked until ' . $blocked->blocked_until);
        }

        return $next($request);
    }
}
