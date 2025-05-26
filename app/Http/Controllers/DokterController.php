<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\schedules;
use App\Models\doctors;
use Carbon\Carbon;
use App\Models\consultations;

class DokterController extends Controller {
    // method untuk dashboard
    public function dashboard() {
        $dokter = auth()->user();

        // Ambil semua jadwal konsultasi hari ini milik dokter ini
        $jadwalHariIni = Schedules::with('consultation.patient')
            ->whereDate('date', today())
            ->where('doctor_id', $dokter->id)
            ->get();

        // Ambil semua konsultasi pasien yang statusnya 'belum dimulai'
        $konsultasiBaru = Consultations::with('patient.user')
            ->where('status_konsultasi', 'belum dimulai')
            ->get();

        $jadwalSemua = schedules::with('consultation.patient.user')->orderBy('time')->get();

        return view('dokter.dashboard-dokter', compact('jadwalHariIni', 'konsultasiBaru', 'dokter', 'jadwalSemua'));
    }

    // method untuk jadwal yang telah selesai
    public function jadwalSelesai() {
        $user = Auth::user();
        $dokter = $user->dokter;
        // Ambil semua jadwal konsultasi hari ini milik dokter ini
        $jadwalSelesai = schedules::with('consultation.patient')->where('doctor_id', $dokter->id)->get();

        return view('dokter.riwayat_penanganan_anda', compact('dokter', 'jadwalSelesai'));
    }

    // method untuk profile dokter
    public function profile() {
        $dokter = doctors::with('user')->where('user_id', auth()->user()->id)->firstOrFail();
        return view('dokter.profile', compact('dokter'));
    }

    // method untuk update profile dokter
    public function updateProfile(Request $request) {
        $user = Auth::user();
        $dokter = $user->dokter;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:500',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'specialization' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
        ]);

        // Update dokter data
        $dokter->update([
            'name' => $validated['name'],
            'birth_date' => $validated['birth_date'],
            'address' => $validated['address'],
            'specialization' => $validated['specialization'],
            'license_number' => $validated['license_number'],
        ]);

        $dokter->user->update([
            'email' => $validated['email']
        ]);

        return redirect()->route('profile.dokter')->with('success', 'Profil dokter ' . $dokter->name . ' berhasil diperbarui.');
    }

    // method untuk tindak lanjut (untuk mengarah ke view form diagnosis)
    public function showTindakLanjutForm($id) {
        $konsultasi = Consultations::with('patient.user')->findOrFail($id);
        return view('dokter.tindaklanjut-form', compact('konsultasi'));
    }

    // method untuk tindak lanjut (untuk crud di form diagnosis)
    public function updateTindakLanjut(Request $request, $id) {
        $request->validate([
            'diagnosis' => 'required|string',
            'status_konsultasi' => 'required|in:belum dimulai,diproses,selesai',
            'price' => 'required|numeric',
        ]);

        $konsultasi = consultations::findOrFail($id);
        $konsultasi->diagnosis = $request->diagnosis;
        $konsultasi->status_konsultasi = $request->status_konsultasi;
        $konsultasi->price = $request->price;
        $konsultasi->save();

        $jadwal = schedules::where('consultation_id', $konsultasi->id)->first();
        $jadwal->status = $request->status_konsultasi;
        $jadwal->save();

        return redirect()->route('dashboard.dokter')->with('success', 'Diagnosis berhasil disimpan.');
    }
}
