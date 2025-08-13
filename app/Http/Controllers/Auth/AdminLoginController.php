<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                $request->session()->regenerate();
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'redirect' => '/admin/dashboard'
                    ]);
                }
                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout();
                $errorMsg = 'You are not authorized as admin';
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMsg
                    ], 403);
                }
                return back()->withErrors(['email' => $errorMsg]);
            }
        }

        $errorMsg = 'Invalid credentials';
        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => $errorMsg
            ], 401);
        }
        return back()->withErrors(['email' => $errorMsg]);
    }
}
