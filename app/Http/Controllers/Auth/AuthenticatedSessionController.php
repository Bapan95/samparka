<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        // Generate a random CAPTCHA string
        $captcha_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 4);

        // Store the CAPTCHA code in the session
        Session::put('captcha', $captcha_code);

        // Return the login view
        return view('auth.login');
    }

    public function captcha()
    {
        // Ensure GD library functions are available
        if (!function_exists('imagecreate')) {
            return abort(500, 'GD library is not available.');
        }

        // Get the captcha code from the session
        $captcha_code = Session::get('captcha');
        // Create an image
        $image = imagecreate(120, 40);
        // Set background and text color
        $background_color = imagecolorallocate($image, 200, 200, 200);
        $text_color = imagecolorallocate($image, 0, 0, 0);

        // Add the CAPTCHA code to the image
        imagestring($image, 5, 30, 10, $captcha_code, $text_color);

        // Set the content type header
        header("Content-type: image/png");

        // Output the image
        imagepng($image);
        imagedestroy($image);
        exit;
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('dashboard', absolute: false));
    // }
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate the CAPTCHA
        if ($request->captcha_input !== Session::get('captcha')) {
            return back()->withErrors(['captcha' => 'The CAPTCHA code is incorrect.']);
        }
        // Modify the authentication logic to use phone_number instead of email
        if (Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password], $request->remember)) {
            // Regenerate the session for security
            $request->session()->regenerate();

            // return redirect()->intended(route('dashboard', absolute: false));
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
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
