<?php

namespace App\Http\Controllers;

use App\Models\consultations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\payments;
class PasienController extends Controller {
    public function dashboard() {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Ambil data pasien yang terhubung dengan user ini
        $patient = $user->patient;

        // Kirim ke view
        if (request()->is('pasien/dashboard-pasien')) {
            return view('pasien.dashboard-pasien', compact('patient'));
        }

        if (request()->is('pasien/profil-pasien')) {
            return view('pasien.profil-pasien', compact('patient'));
        }

        if (request()->is('pasien/konsultasi-pasien')) {
            return view('pasien.konsultasi-pasien', compact('patient'));
        }
    }

    public function update(Request $request) {
        $user = Auth::user();
        $patient = $user->patient;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:500',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'tipe' => 'required|in:online,offline',
        ]);

        // Update patient data
        $patient->update([
            'name' => $validated['name'],
            'birth_date' => $validated['birth_date'],
            'address' => $validated['address'],
            'tipe' => $validated['tipe'],
        ]);

        $patient->user->update([
            'email' => $validated['email']
        ]);

        return redirect()->route('dashboard.pasien')->with('success', 'Profil berhasil diperbarui.');
    }

    public function jadwalKonsultasi() {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil pasien dari user tersebut
        $patient = $user->patient;

        // Ambil semua konsultasi milik pasien ini, misalnya urutkan berdasarkan yang terbaru
        $consultations = $patient->consultations()
            ->with('schedule') // eager load schedule
            ->latest()
            ->get();

        // Kirim data ke view
        return view('pasien.jadwal_konsultasi-pasien', compact('consultations', 'patient'));
    }

    public function pembayaran() {
        $user = Auth::user();
        $patient = $user->patient;

        // Ambil payments terkait konsultasi pasien yang status pembayaran belum 'paid'
        $payments = payments::whereHas('consultation', function ($query) use ($patient) {
            $query->where('patient_id', $patient->id);
        })->get();

        return view('pasien.pembayaran', compact('payments', 'patient'));
    }

    public function bayar(Request $request, $id) {
        $user = Auth::user();
        $patient = $user->patient;

        // Cari payment berdasarkan ID, tapi pastikan payment tersebut milik konsultasi dari pasien ini
        $payment = payments::where('id', $id)
            ->whereHas('consultation', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })
            ->firstOrFail();

        // Update status pembayaran
        $payment->update([
            'status' => 'paid',
            'payment_method' => 'online', // tambahkan jika perlu
            'payment_date' => now(),
        ]);


        // Update juga status_pembayaran di tabel consultations
        $payment->consultation->update([
            'status_pembayaran' => 'paid',
        ]);

        return redirect()->route('pembayaran.pasien')->with('success', 'Pembayaran berhasil dilakukan.');
    }

}
