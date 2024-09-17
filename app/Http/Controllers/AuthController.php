<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $infoLogin = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (Auth::attempt($infoLogin)) {
                if (Auth::user()->role == 'user') {
                    $request->session()->regenerate();
                    return response()->json(['success' => 'Login successful! Redirecting to user dashboard...', 'redirect' => '/user-dashboard']);
                } elseif (Auth::user()->role == 'admin') {
                    $request->session()->regenerate();
                    return response()->json(['success' => 'Login successful! Redirecting to admin dashboard...', 'redirect' => '/admin-dashboard']);
                }
            } else {
                return response()->json(['errors' => 'Password atau Email salah.'], 401);
            }
        } catch (ValidationException $e) {
            Log::error('An error occurred during authentication', ['exception' => $e]);
            return response()->json(['errors' => $e->validator->errors()->all()], 422);
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'fullname' => 'required|string|max:30|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = new User();
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return response()->json(['success' => 'Berhasil mendaftar!!', 'redirect' => '/login']);
        } catch (\Exception $e) {
            Log::error('An error occurred during authentication', ['exception' => $e]);
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
}
