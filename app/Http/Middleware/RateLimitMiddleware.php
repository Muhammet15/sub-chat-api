<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Cache\RateLimiter;

class RateLimitMiddleware
{
    use ApiResponse;
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, Closure $next, $key = 'default', $maxAttempts = 10, $decaySeconds = 60)
    {
        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            return $this->errorResponse(false,'Too Many Requests.',[],Response::HTTP_TOO_MANY_REQUESTS);

        }

        $this->limiter->hit($key, $decaySeconds);

        $response = $next($request);

        return $response;
    }
}
