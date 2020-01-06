<?php

namespace App\Http\Middleware;

use Closure;

class FiltereMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  $data
     * @return mixed
     */
    public function handle($request, Closure $next, array $data)
    {

        $response = $next($request);
        // $content = $response->content();
        $content = $response->getContent();
         $data;
         eval(\Psy\sh());
    }
}
