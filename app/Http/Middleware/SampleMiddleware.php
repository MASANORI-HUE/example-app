<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** 前に処理をはさみみたい場合ここに記述する*/
        $response = $next($request); // コントローラーの実行

        /** 後に処理を挟みたい場合ここに記述する*/
        return $response;
    }
}
