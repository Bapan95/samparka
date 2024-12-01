<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Mews\Captcha\Facades\Captcha;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Return the login view
        return view('auth.login');
    }

    /**
     * Generate CAPTCHA image.
     */
    public function captcha()
    {
        // Refresh CAPTCHA
        return response()->json(['captcha' => captcha_src()]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        // Validate the CAPTCHA
        if (!captcha_check($request->captcha_input)) {
            return back()->withErrors(['captcha' => 'The CAPTCHA code is incorrect.'])->withInput();
        }

        // Attempt to authenticate using phone_number
        if (Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password], $request->remember)) {
            // Regenerate the session for security
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'phone_number' => __('The provided credentials do not match our records.'),
        ])->onlyInput('phone_number');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
