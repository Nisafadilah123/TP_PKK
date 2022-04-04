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
        if ($user = auth()->user()) {
            if ($user->user_type !== $userType) {
                // return abort(403);
                Alert::error('Gagal', 'Anda Harus login terlebih dahu');

                return redirect('login');
            }
        }

        return $next($request);
    }
}