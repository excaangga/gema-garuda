<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuperAdminCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Assuming the user's category is passed in the request
        $userCategory = $request->input('id_category');

        // If the user is trying to access a category that requires super admin verification
        if ($userCategory !== 6) { // '6' is the default value for 'person'
            $superAdminCode = $request->query('superAdminCode');

            // Assuming the super admin code is '123456'
            if ($superAdminCode !== '123456') {
                return response()->json(['error' => 'Invalid super admin code'], 403);
            }
        }

        return $next($request);
    }
}
