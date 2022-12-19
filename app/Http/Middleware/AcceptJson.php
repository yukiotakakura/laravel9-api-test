<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcceptJson
{
    /**
     * apiへのリクエスト時にリクエストヘッダに Accept: application/json を付与する
     *
     * @param Request $request
     * @param Closure $next
     * @return 
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
