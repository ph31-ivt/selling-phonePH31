<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class adminPage
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
        if (Auth::check()) {
            if (!(Auth::user()->user_type == User::USER_ADMIN || Auth::user()->user_type == User::USER_SHIPPER)) {
                //            if ($request->ajax()) {
                //                return response('Forbidden', 403);
                //            }
                //            else
                //            {
                ////                throw new AccessDeniedException('Forbidden');
                //                return redirect()->back();
                //            }
                return redirect()->route('index');
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}
