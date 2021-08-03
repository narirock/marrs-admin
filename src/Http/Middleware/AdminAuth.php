<?php

namespace Marrs\MarrsAdmin\Http\Middleware;

use Closure;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('admin')->user()) {
            return $next($request);
        } else {
            return redirect()->route('admin.login', ['redirect' => $request->getRequestUri()]);
        }
    }
}
