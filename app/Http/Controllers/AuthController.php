<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
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
