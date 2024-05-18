<?php

namespace App\Http\Middleware;

use App\Http\Traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUesr
{
use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { if ($request->is('api/*')) {
        if(auth('sanctum')->check()) {
            $user = auth('sanctum')->user();
            if($user->status == 1) {
                return $next($request);
            } else {
                return $this->unAuthorizeResponse();
            }
        } else {
            return $this->unAuthorizeResponse();
        }
    }

    }
}
