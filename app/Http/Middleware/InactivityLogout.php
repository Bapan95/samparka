<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InactivityLogout
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has expired
        if (session()->has('last_activity') && (time() - session('last_activity')) > 300) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');  // Redirect to home or login page
        }

        // Update the last activity timestamp
        session(['last_activity' => time()]);

        return $next($request);
    }
}
