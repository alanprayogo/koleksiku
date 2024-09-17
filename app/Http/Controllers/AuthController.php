<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    try {
        // Validasi input login
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        // Cek kredensial login menggunakan Auth::attempt
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Redirect berdasarkan role user
            if ($user->role == 'admin') {
                return response()->json(['success' => 'Login berhasil', 'redirect' => route('dashboard-admin')]);
            } elseif ($user->role == 'user') {
                return response()->json(['success' => 'Login berhasil', 'redirect' => route('dashboard-user')]);
            } else {
                // Tambahkan penanganan jika role lain diperlukan
                return response()->json(['errors' => 'Role tidak diketahui'], 403);
            }
        } else {
            // Jika login gagal (email/password salah)
            return response()->json(['errors' => 'Email atau password salah'], 401);
        }
    } catch (\Exception $e) {
        // Log error dan kirimkan respons error umum
        Log::error('An error occurred during login', ['exception' => $e]);
        return response()->json(['errors' => 'Terjadi kesalahan server'], 500);
    }
}


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            // Validasi input dari form registrasi
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Jika validasi gagal, kirimkan pesan kesalahan
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Jika validasi berhasil, buat user baru
            User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Kirimkan pesan sukses
            return response()->json(['success' => 'Berhasil mendaftar!!', 'redirect' => '/']);
        } catch (\Exception $e) {
            // Log kesalahan dan kirimkan pesan kesalahan
            Log::error('An error occurred during registration', ['exception' => $e]);
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
}
