<?php

namespace App\Http\Middleware;
use RealRashid\SweetAlert\Facades\Alert;

use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string $userType
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        $check = false;

        if ($user = auth()->user()) {
            if ($user->user_type === $userType) {

                $check = true;

            }
        }

        if ($check === false) {
            if ($userType === 'superadmin') {
                return redirect()->route('super_admin.login')->withErrors(['email' => ['Anda harus login sebagai admin terlebih dahulu.']]);
            }
            // } elseif ($userType === '') {
            //     # code...
            // }
        }

        return $next($request);
    }
}