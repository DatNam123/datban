<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->utype == 'CUS') {
            // Đăng nhập thành công, chuyển hướng đến trang khách hàng
            return redirect()->intended('/')->with('message', 'Welcome to Feliciano Restaurant');
        }
        if (Auth::attempt($credentials) && Auth::user()->utype == 'ADM') {
            // Đăng nhập thành công, chuyển hướng đến trang nhân viên
            return redirect()->intended('/admin')->with('message', 'Welcome to Admin Feliciano Restaurant');
        }
        // Đăng nhập không thành công, chuyển hướng về trang đăng nhập
        return redirect('/login')->withErrors(['email' => 'Email or password is incorrect!']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
