<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        $user = User::all()->count();
        if (!($user == 1))
        {
            if (!Auth::user()->hasPermissionTo('Admin Roles & Permissions')) //If user does //not have this permission
            {
                abort('401');
                // return redirect()->to('errors.401')->with('status','ACCESS DENIED');
            }
        }

        return $next($request);
    }
}
