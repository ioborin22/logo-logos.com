<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store as SessionStore;

class RateLimitSession
{
    protected $session;
    protected $requestLimit = 10;
    protected $requestTimeout = 60;

    public function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    public function handle(Request $request, Closure $next)
    {
        $now = time();
        $requests = $this->session->get('requests', []);

        // Filter out old requests
        $requests = array_filter($requests, function ($timestamp) use ($now) {
            return ($now - $timestamp) < $this->requestTimeout;
        });

        if (count($requests) > $this->requestLimit) {
            // If the request limit is exceeded, return a 429 response
            return response('Too Many Requests', 429);
        }

        // Add the current request timestamp to the session
        $requests[] = $now;
        $this->session->put('requests', $requests);

        return $next($request);
    }
}
