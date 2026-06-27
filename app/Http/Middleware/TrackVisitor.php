<?php

namespace App\Http\Middleware;

use App\Models\VisitorStat;
use Closure;
use Illuminate\Http\Request;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $today = now()->format('Y-m-d');

        $stat = VisitorStat::firstOrCreate(
            ['visit_date' => $today],
            ['count' => 0]
        );

        $stat->increment('count');

        return $next($request);
    }
}
