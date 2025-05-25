<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;
use App\Models\schedules;
use App\Models\consultations;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\patients;

class ResepsionisController extends Controller
{
      public function dashboard() {
        $patients = patients::all(); // mengambil semua data pasien
        return view('resepsionis.resepsionis-dashboard', compact('patients'));
    }

    public function createPasien() {
        return view('resepsionis.addPasien');
    }

    public function tambahPasien(Request $request) {
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
            'tipe' => 'offline',
        ]);

        return redirect()->back()->with('success', 'Pasien berhasil ditambahkan.');
    }

     // view daftar jadwal
    public function getAllScheduls() {
        $consultations = consultations::all(); // mengambil semua data pasien
        return view('resepsionis.jadwalKonsultasi', compact('consultations'));
    }

    // view daftar jadwal
    public function createScheduls() {
        $consultations = consultations::all(); // mengambil semua data pasien
        $doctors = doctors::all(); // mengambil semua data pasien

        return view('resepsionis.addJadwalKonsultasi', compact('consultations', 'doctors'));
    }

    //
    public function getPasien() {
        $patients = patients::all(); // mengambil semua data pasien
        return view('resepsionis.daftarPasien', compact('patients'));
    }
}
