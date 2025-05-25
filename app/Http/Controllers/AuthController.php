<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patients; // Pastikan huruf kapital sesuai model

class AuthController extends Controller {
    // Tampilkan form login
    public function showLogin() {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'pasien') {
                return redirect()->intended(route('dashboard.pasien'));
            }

            if ($user->role === 'dokter') {
                return redirect()->intended(route('dashboard.dokter'));
            }

            if ($user->role === 'admin') {
                return redirect()->intended(route('dashboard.admin'));
            }

            if ($user->role === 'resepsionis') {
                return redirect()->intended(route('dashboard.resepsionis'));
            }

            return redirect()->intended('/dashboard'); // default
        }

        return back()->withErrors([
            'error' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Tampilkan form registrasi
    public function showRegister() {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'birth_date' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'pasien',
        ]);

        Patients::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'birth_date' => $validated['birth_date'],
            'address' => $validated['alamat'],
            'tipe' => 'online',
        ]);

        Auth::login($user);

        return redirect(route('dashboard.pasien'));
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
