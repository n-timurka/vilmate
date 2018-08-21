<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class API {

    public function handle($request, Closure $next) {
        header('Access-Control-Allow-Origin: *');

        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Origin, Content-Type, X-Auth-Token'
        ];
        if ($request->getMethod() == "OPTIONS") {
            return response('OK', 200, $headers);
        }
        
        $response = $next($request);
        foreach ($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }

}