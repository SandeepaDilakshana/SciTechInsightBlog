<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::user()->admin) {

            $notification = [
                'message' => 'You do not have permission to perform this action !',
                'alert-type' => 'warning',
            ];

            return redirect()->back()->with($notification);
        }

        return $next($request);
    }
}
