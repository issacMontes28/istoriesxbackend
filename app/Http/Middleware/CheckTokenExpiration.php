<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckTokenExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the currently authenticated user
        $user = Auth::user();

        //dd('Authorization Header: ' . $request->header('Authorization'));
        // Check if the user has an active token
        if ($user && $user->tokens->isNotEmpty()) {
            $token = $user->currentAccessToken();

            // Compare the token's expiration date with the current time
            if ($token && $token->expires_at && Carbon::now()->greaterThan($token->expires_at)) {
                // If the token is expired, revoke it and return an error response
                $token->delete();
                return response()->json(['message' => 'Token has expired'], 401);
            }
        }

        return $next($request);
    }
}
