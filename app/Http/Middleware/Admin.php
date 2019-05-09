<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if( Auth::check() && Auth::user()->isAdmin() ) {
            return $next($request);
        } else {
            $message = 'คุณไม่มีสิทธิในการเข้าถึงหน้านี้ กรุณาล็อกอินด้วยบัญชีที่มีสิทธิเท่านั้น';
            // abort(403, 'Unauthorized action.');
            return redirect('login')->with('status', $message);
        }
    }
}
