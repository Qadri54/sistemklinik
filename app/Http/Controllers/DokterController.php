<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\schedules;
use Carbon\Carbon;
use App\Models\consultations;

class DokterController extends Controller {
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

        return view('dokter.dashboard-dokter', compact('jadwalHariIni', 'konsultasiBaru', 'dokter','jadwalSemua'));
    }

    public function showTindakLanjutForm($id) {
        $konsultasi = Consultations::with('patient.user')->findOrFail($id);
        return view('dokter.tindaklanjut-form', compact('konsultasi'));
    }

    public function updateTindakLanjut(Request $request, $id) {
        $request->validate([
            'diagnosis' => 'required|string',
            'status_konsultasi' => 'required|in:belum dimulai,diproses,selesai',
        ]);

        $konsultasi = consultations::findOrFail($id);
        $konsultasi->diagnosis = $request->diagnosis;
        $konsultasi->status_konsultasi = $request->status_konsultasi;
        $konsultasi->save();

        return redirect()->route('dashboard.dokter')->with('success', 'Diagnosis berhasil disimpan.');
    }


}
