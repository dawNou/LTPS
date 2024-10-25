<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'login.index',
            [
                'title' => 'Login',
                'active' => 'login'
            ]
        );
    }

    // #1 debugging
    // public function authenticate(Request $request)
    // {
    //     // Log the request data (excluding password and captcha for security reasons)
    //     // Log::info('Authentication attempt with email: ' . $request->email);

    //     // $credentials = $request->validate([
    //     //     // 'email' => 'required|email:dns',
    //     //     'email' => 'required|email',
    //     //     'password' => 'required',
    //     //     'captcha' => 'required|captcha'
    //     // ]);

    //     // Validasi input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'captcha' => 'required|captcha'
    //     ]);

    //     // $authCredentials = $request->only('email', 'password');

    //     // Log the validated credentials (excluding password for security reasons)
    //     // #1
    //     // Log::info('Validated credentials for email: ' . $authCredentials['email']);
    //     // #2
    //     Log::info('Authentication attempt with email: ' . $request->email);

    //     // Extract only email and password for authentication
    //     $credentials = $request->only('email', 'password');

    //     // Log the validated credentials
    //     Log::info('Validated credentials for email: ' . $credentials['email']);

    //     // Debug the credentials
    //     // dd($credentials);

    //     // Find the user by email
    //     $user = \App\Models\User::where('email', $credentials['email'])->first();
    //     if ($user) {
    //         Log::info('User found: ' . $user->email);
    //     } else {
    //         Log::error('User not found with email: ' . $credentials['email']);
    //         return back()->with('loginError', 'User tidak ditemukan!');
    //     }

    //     if (Auth::attempt($credentials)) {
    //         Log::info('Authentication successful for user: ' . $credentials['email']);
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard');
    //     }

    //     // Log the failure
    //     Log::error('Authentication failed for user: ' . $credentials['email']);

    //     return back()->with('loginError', 'Login Gagal!');
    // }

    // #2 debugging
    // public function authenticate(Request $request)
    // {
    //     // Log the request data (excluding password and captcha for security reasons)
    //     Log::info('Authentication attempt with email: ' . $request->email);

    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'captcha' => 'required|captcha'
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     // Log the validated credentials
    //     Log::info('Validated credentials for email: ' . $credentials['email']);

    //     // Debug the credentials
    //     // dd($credentials);

    //     // Find the user by email
    //     $user = \App\Models\User::where('email', $credentials['email'])->first();
    //     if ($user) {
    //         Log::info('User found: ' . $user->email);
    //     } else {
    //         Log::error('User not found with email: ' . $credentials['email']);
    //         return back()->with('loginError', 'User tidak ditemukan!');
    //     }

    //     if (Auth::attempt($credentials)) {
    //         Log::info('Authentication successful for user: ' . $credentials['email']);
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard');
    //     }

    //     // Log the failure
    //     Log::error('Authentication failed for user: ' . $credentials['email']);

    //     return back()->with('loginError', 'Login Gagal!');
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $credentials = $request->only('email', 'password');

        // Find the user by email
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if (!$user) {
            return back()->with('loginError', 'Login Gagal!');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }



    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
