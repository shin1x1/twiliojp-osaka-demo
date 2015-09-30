<?php
namespace App\Http\Middleware;

use Closure;

class AuthenticateWithBasicAuth extends \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth
{
    /**
     * @inheritdoc
     */
    public function handle($request, Closure $next)
    {
        return $this->auth->basic('name') ?: $next($request);
    }
}
